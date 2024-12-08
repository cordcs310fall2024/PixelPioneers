function editEvents(name, photo, bio, eventDate) {
    // Set the event details in the form
    document.getElementById('eventTitle').value = title;
    document.getElementById('photoPreview').src = photo; 
    console.log('Photo URL set to: ', photo);
    document.getElementById('eventDesc').value = desc;
    document.getElementById('eventDate').value = date; 
}

function saveEvents() {
    var title = document.getElementById('eventTitle').value;
    var desc = document.getElementById('eventDesc').value;
    var date = document.getElementById('eventDate').value;

    var photoUpload = document.getElementById('eventPhotoUpload');
    var photo;
    if (photoUpload.files && photoUpload.files[0]) {
        photo = URL.createObjectURL(photoUpload.files[0]); 
    } else {
        photo = document.getElementById('photoPreview').src; 
    }
    alert("Event updated: " + title + "\nDescription: " + desc + "\nDate: " + date);
}

function previewPhoto() {
    var photoUpload = document.getElementById('eventPhotoUpload');
    if (photoUpload.files && photoUpload.files[0]) {
        var preview = document.getElementById('photoPreview');
        preview.src = URL.createObjectURL(photoUpload.files[0]); 
    }
}