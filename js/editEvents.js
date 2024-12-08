let currentEventId = null;

function editEvent(title, shortDesc, detailedDesc, time, type, imgPath, date, eventId) {
    // Set form fields to the input from the PHP files
    document.getElementById('eventTitle').value = title;
    // Update image preview ONLY if imgPath is not empty
    if (imgPath) {
        document.getElementById('photoPreview').src = imgPath;
    } else {
        document.getElementById('photoPreview').src = ""; // Clear preview if no image
    }
    document.getElementById('eventDesc').value = shortDesc;
    document.getElementById('eventDetailedDesc').value = detailedDesc; 
    document.getElementById('eventTime').value = time; 
    document.getElementById('eventType').value = type; 
    document.getElementById('eventDate').value = date;
    currentEventId = eventId;
}


// Save changes button
function saveEvent() {
    const title = document.getElementById('eventTitle').value;
    const shortDesc = document.getElementById('eventDesc').value;
    const detailedDesc = document.getElementById('eventDetailedDesc').value; 
    const time = document.getElementById('eventTime').value; 
    const type = document.getElementById('eventType').value; 
    const photoUpload = document.getElementById('eventPhotoUpload');
    const date = document.getElementById('eventDate').value;

    // Create a FormData object
    const formData = new FormData();
    formData.append('id', currentEventId);
    formData.append('title', title);
    formData.append('shortDesc', shortDesc); 
    formData.append('detailedDesc', detailedDesc); 
    formData.append('time', time); 
    formData.append('type', type); 
    formData.append('date', date);

    // Only append the photo if a file was selected
    if (photoUpload.files && photoUpload.files[0]) {
        formData.append('photo', photoUpload.files[0]);
    }

    // Send the data using the Fetch API
    fetch('updateEvent.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.text())
    .then(data => {
        alert(data); 
        location.reload();
    })
    .catch(error => console.error('Error:', error));
}


// Preview photo
function previewPhoto() {
    const photoUpload = document.getElementById('eventPhotoUpload');
    if (photoUpload.files && photoUpload.files[0]) {
        const preview = document.getElementById('photoPreview');
        preview.src = URL.createObjectURL(photoUpload.files[0]);
    }
}

