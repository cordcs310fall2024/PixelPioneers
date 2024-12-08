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

// Set session timeout duration (20 minutes)
$timeout_duration = 1200; // 20 minutes in seconds

// Check if the session has expired
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout_duration) {
    // Destroy the session if it has expired
    session_unset();
    session_destroy();
    header("Location: login.php?timeout=true"); 
    exit();
}

$_SESSION['last_activity'] = time();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
   header("Location: login.php");  
   exit();
}
?>

<?php
$host = "localhost";
$username = "root";
$dbname = "ClubDatabase_copy";
$password = "Lennox2000";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT ID, event_title, event_desc, event_img, event_date FROM events";
$result = $conn->query($sql);


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
      <button onclick="window.location.href='adminSignUp.php'">
            <i class="bi bi-person-plus"></i> Add User
        </button>
   </div>

   <!-- Content area -->
   <div class="content">
      <form id="event-form" enctype="multipart/form-data">
         <h1>Add Event</h1>
         <div class="form-group">
            <input type="text" id="newEventTitle" name="event_title" required>
            <label for="newEventTitle">Title</label>
         </div>

         <div class="form-group">
            <textarea id="newEventDesc" rows="4" name = "event_desc" required></textarea>
            <label for="newEventDesc">Description</label>
         </div>

         <div class="form-group">
               <div class="photo-preview">
                  <img id="newPhotoPreview" src="" alt="" style="width: 150px; height: auto; display: none;">
               </div>
            <input type="file" id="newEventPhotoUpload" name = "event_img" accept="image/*" onchange="previewNewPhoto()">
            <label for="newEventPhoto"></label>
         </div>
         <div class="form-group">
            <input type="date" id="newEventDate" name = "event_date" required>
            <label for="newEventDate"></label>
         </div>

         <button type="button" onclick="addNewEvent()">Submit</button>
      </form>
   </div>
</div>
<?php 
    require_once("footer.php")
    ?>
<script src="js/addEvent.js"></script>

<?php $conn->close(); ?>

</body>
</html>