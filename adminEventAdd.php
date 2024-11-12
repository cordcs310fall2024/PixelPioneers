<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/adminMembers.css">
</head>
<body>
<?php 
  require_once("header.php")
?>

<div class="admin-page">
   <!-- Sidebar for actions -->
   <div class="sidebar">
      <button onclick="window.location.href='orderMembers.php'">
         <i class="bi bi-list-ul"></i> Order Members
      </button>
      <button onclick="window.location.href='adminMembers.php'">
         <i class="bi bi-pencil-square"></i> Edit Members
      </button>
      <button onclick="window.location.href='addMember.php'">
         <i class="bi bi-person-plus"></i> Add Member
      </button>
      <button onclick="window.location.href='adminEventAdd.php'">
         <i class="bi bi-person-plus"></i> Add Event
      </button>
      <button onclick="window.location.href='adminEventEdit.php'">
         <i class="bi bi-pencil-square"></i> Edit Event
      </button>
   </div>

   <!-- Content area -->
   <div class="content">
      <!-- Middle Column - Members Grid -->
      <div class="middle-column">
         <div class="member-grid">
            <div class="member-grid-item" onclick="editEvents('Barbarian', 'img/ferrets/ferret1.png', 'Lorem ipsum dolor sit amet...')">
               <img src="img/ferrets/ferret1.png" alt="Member Photo">
               <div class="middle">
                  <div class="memberName">Barbarian</div>
               </div>
            </div>
            <div class="member-grid-item" onclick="editEvents('Crusader', 'img/ferrets/ferret2.png', 'Consectetur adipiscing elit...')">
               <img src="img/ferrets/ferret2.png" alt="Member Photo">
               <div class="middle">
                  <div class="memberName">Crusader</div>
               </div>
            </div>
         </div>
      </div>

      <!-- Right Column - Edit Member Details -->
      <div class="right-column">
         <h3>Edit Event</h3>
         <div class="form-group">
            <label for="memberName">Title</label>
            <input type="text" id="memberName" value="">
         </div>
         <div class="form-group">
            <label for="memberPhoto">Photo</label>
            <div class="photo-preview">
               <img id="photoPreview" src="" alt="" style="width: 150px; height: auto;">
            </div>
            <input type="file" id="memberPhotoUpload" accept="image/*" onchange="previewPhoto()">
         </div>
         <div class="form-group">
            <label for="memberBio">Description</label>
            <textarea id="memberBio"></textarea>
         </div>
        
         <div class="form-group">
            <label for="eventDate">Event Date</label>
            <input type="date" id="eventDate" value="">
         </div>

         <div class="form-group">
            <button onclick="saveEvents()">Save Changes</button>
         </div>
         <div class="form-group">
            <button id="delete">Delete Event</button>
         </div>
      </div>
   </div>
</div>

<script src="js/adminEvents.js"></script>
<?php 
    require_once("footer.php")
    ?>
</body>
</html>