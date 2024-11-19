let currentMemberId = null; //make sure the id is the currently selected member

function editMember(name, photo, bio, id) {
   // set form fields to the input from the php files
   document.getElementById('memberName').value = name;
   document.getElementById('photoPreview').src = photo;
   document.getElementById('memberBio').value = bio;
   currentMemberId = id; // save the ID for referencing in table
}


//save changes button
function saveMember() {
   //get values with the form fields in editMember
   const name = document.getElementById('memberName').value;
   const bio = document.getElementById('memberBio').value;
   const photoUpload = document.getElementById('memberPhotoUpload');

   //create a FormData object to send to the database https://javascript.info/formdata
   const formData = new FormData();
   formData.append('id', currentMemberId);
   formData.append('name', name);
   formData.append('bio', bio);

   //if a new photo is uploaded then include that too
   if (photoUpload.files && photoUpload.files[0]) {
      formData.append('photo', photoUpload.files[0]);
   }

   // Send the data to the table using the `fetch` API  https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API/Using_Fetch
   fetch('updateMember.php', {
      method: 'POST', //post method
      body: formData, //send the FormData object
   })
   .then(response => response.text()) // parse the localhost response as text
   .then(data => {
      alert(data);  // show localhost response to confirm it worked
      location.reload(); 
   })
   .catch(error => console.error('Error:', error)); //log any errors because yeah
}


//preview photo in editMember.php
function previewPhoto() {
   //get file input from form
   const photoUpload = document.getElementById('memberPhotoUpload');

   //check if a file is selected before opening it otherwise it hates you
   if (photoUpload.files && photoUpload.files[0]) {
      //set image as an element
       const preview = document.getElementById('photoPreview');
       //create a temporary url for viewing before submitting to the table
       //https://developer.mozilla.org/en-US/docs/Web/API/URL/createObjectURL_static
       preview.src = URL.createObjectURL(photoUpload.files[0]);
   }
}
