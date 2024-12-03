let currentEventId = null; 

function editEvent(title, photo, desc, id, date) {
   // set form fields to the input from the php files
   document.getElementById('eventTitle').value = title;
   document.getElementById('photoPreview').src = photo;
   document.getElementById('eventDesc').value = desc;
   document.getElementById('eventDate').value = date;
   currentEventId = id; 
}


//save changes button
function saveEvent() {

   const title = document.getElementById('eventTitle').value;
   const desc = document.getElementById('eventDesc').value;
   const photoUpload = document.getElementById('eventPhotoUpload');
   const date = document.getElementById('eventDate').value;

   //create a FormData object to send to the database https://javascript.info/formdata
   const formData = new FormData();
   formData.append('id', currentEventId);
   formData.append('title', title);
   formData.append('desc', desc);
   formData.append('date', date);

   //if a new photo is uploaded then include that too
   if (photoUpload.files && photoUpload.files[0]) {
      formData.append('photo', photoUpload.files[0]);
   }

   // Send the data to the table using the `fetch` API  https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API/Using_Fetch
   fetch('updateEvent.php', {
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
   const photoUpload = document.getElementById('eventPhotoUpload');

   //check if a file is selected before opening it otherwise it hates you
   if (photoUpload.files && photoUpload.files[0]) {
      //set image as an element
       const preview = document.getElementById('photoPreview');
       //create a temporary url for viewing before submitting to the table
       //https://developer.mozilla.org/en-US/docs/Web/API/URL/createObjectURL_static
       preview.src = URL.createObjectURL(photoUpload.files[0]);
   }
}

