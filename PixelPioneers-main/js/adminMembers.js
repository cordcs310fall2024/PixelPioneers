function editMember(name, photo, bio) {
   // Set the member's details in the form
   document.getElementById('memberName').value = name;
   document.getElementById('photoPreview').src = photo; 
   console.log('Photo URL set to: ', photo);
   document.getElementById('memberBio').value = bio;
}

function saveMember() {
   var name = document.getElementById('memberName').value;
   var bio = document.getElementById('memberBio').value;
   
   // Check if a new photo has been uploaded
   var photoUpload = document.getElementById('memberPhotoUpload');
   if (photoUpload.files && photoUpload.files[0]) {
       var photo = URL.createObjectURL(photoUpload.files[0]); 
   } else {
       var photo = document.getElementById('photoPreview').src; 

   alert("Member updated: " + name);

}
}

function previewPhoto() {
   var photoUpload = document.getElementById('memberPhotoUpload');
   if (photoUpload.files && photoUpload.files[0]) {
       var preview = document.getElementById('photoPreview');
       preview.src = URL.createObjectURL(photoUpload.files[0]); 
   }
}
