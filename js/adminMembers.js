function editMember(name, photo, bio) {
    document.getElementById('memberName').value = name;
    document.getElementById('memberPhoto').value = photo;
    document.getElementById('memberBio').value = bio;
 }

 function saveMember() {
    var name = document.getElementById('memberName').value;
    var photo = document.getElementById('memberPhoto').value;
    var bio = document.getElementById('memberBio').value;
    alert("Member updated: " + name);
    // Add your save logic here if needed.
 }