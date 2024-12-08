function previewNewPhoto() {
    const photoUpload = document.getElementById('newEventPhotoUpload'); 
    if (photoUpload.files && photoUpload.files[0]) {
       const preview = document.getElementById('newPhotoPreview');
       preview.src = URL.createObjectURL(photoUpload.files[0]);
       preview.style.display = "block";
    }
 }
 
 function addNewEvent() {
    const title = document.getElementById('newEventTitle').value;
    const desc = document.getElementById('newEventDesc').value;
    const photoUpload = document.getElementById('newEventPhotoUpload');
    const date = document.getElementById('newEventDate').value;
 
    if (!title || !desc || !photoUpload.files[0] || !date) {
       alert("Please fill out all fields and upload a photo.");
       return;
    }
 
    const formData = new FormData();
    formData.append('title', title);
    formData.append('desc', desc);
    formData.append('photo', photoUpload.files[0]);
    formData.append('date', date);
 
    fetch('adminEventAddHandler.php', {
       method: 'POST',
       body: formData,
    })
    .then(response => response.text())
    .then(data => {
       alert(data);
       document.getElementById('addEventForm').reset();
       document.getElementById('newPhotoPreview').style.display = "none";
    })
    .catch(error => console.error('Error:', error));
 }
 