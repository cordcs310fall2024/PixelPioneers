<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/addMember.css">
</head>
<body>
<?php 
  require_once("header.php")
  ?>

<?php 
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
   header("Location: login.php"); 
   exit();
}
?>

<div class="admin-page">
   <!-- Sidebar for actions -->
   <div class="sidebar">
   <button onclick="window.location.href='orderMembers.php'">
         <i class="bi bi-list-ul"></i> Order Members
      </button>
      <button onclick="window.location.href='editMembers.php'">
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

  <!-- Content -->
  <div class="content">
      <div class="right-column">
         <h3>Add New Member</h3>
         <form id="addMemberForm">
            <div class="form-group">
               <label for="newMemberName">Name</label>
               <input type="text" id="newMemberName" required>
            </div>
            <div class="form-group">
               <label for="newMemberPhoto">Photo</label>
               <div class="photo-preview">
                  <img id="newPhotoPreview" src="" alt="" style="width: 150px; height: auto; display: none;">
               </div>
               <input type="file" id="newMemberPhotoUpload" accept="image/*" onchange="previewNewPhoto()">
            </div>
            <div class="form-group">
               <label for="newMemberBio">Bio</label>
               <textarea id="newMemberBio" required></textarea>
            </div>
            
            <div class="form-group">
               <button type="button" onclick="addNewMember()">Add Member</button>
            </div>
         </form>
      </div>
  div>
</div>
<?php 
    require_once("footer.php")
    ?>
<script src="js/addMember.js"></script>

<?php $conn->close(); ?>