function editEvents(name, photo, bio, eventDate) {
    // Set the event details in the form
    document.getElementById('memberName').value = name;
    document.getElementById('photoPreview').src = photo; 
    console.log('Photo URL set to: ', photo);
    document.getElementById('memberBio').value = bio;
    document.getElementById('eventDate').value = eventDate; 
}

function saveEvents() {
    var name = document.getElementById('memberName').value;
    var bio = document.getElementById('memberBio').value;
    var eventDate = document.getElementById('eventDate').value;

    var photoUpload = document.getElementById('memberPhotoUpload');
    var photo;
    if (photoUpload.files && photoUpload.files[0]) {
        photo = URL.createObjectURL(photoUpload.files[0]); 
    } else {
        photo = document.getElementById('photoPreview').src; 
    }
    alert("Event updated: " + name + "\nDescription: " + bio + "\nDate: " + eventDate);
}

function previewPhoto() {
    var photoUpload = document.getElementById('memberPhotoUpload');
    if (photoUpload.files && photoUpload.files[0]) {
        var preview = document.getElementById('photoPreview');
        preview.src = URL.createObjectURL(photoUpload.files[0]); 
    }
}