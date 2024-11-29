<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/editMembers.css">
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
$dbname = "ClubDatabase";
$password = "";

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
   </div>

      <!-- Content -->
   <div class="content">
      <!-- Middle Column -->
      <div class="middle-column">
         <div class="member-grid">
            <?php if ($result->num_rows > 0): ?> 
               <?php while ($row = $result->fetch_assoc()): ?>        
                  <div class="member-grid-item" 
                       onclick="editEvent('<?php echo addslashes($row['event_title']); ?>', 
                                          'data:image/jpeg;base64,<?php echo base64_encode($row['event_img']); ?>', 
                                          '<?php echo addslashes($row['event_desc']); ?>',
                                          '<?php echo addslashes($row['event_date']); ?>',
                                          <?php echo $row['ID']; ?>)">
                     <img src="data:image/jpeg;base64,<?php echo base64_encode($row['event_img']); ?>" alt="Event Photo">
                     <div class="middle">
                        <div class="eventName"><?php echo htmlspecialchars($row['event_title']); ?></div>
                        <div class="eventName"><?php echo htmlspecialchars($row['event_date']); ?></div>
                     </div>
                  </div>
               <?php endwhile; ?>
            <?php else: ?>
               <p>No events found.</p>
            <?php endif; ?>
         </div>
      </div>

      <!-- Right Column - Edit Event Details -->
      <div class="right-column">
         <h3>Edit Event</h3>
         <div class="form-group">
            <label for="eventTitle">Title</label>
            <input type="text" id="eventTitle" name="event_title" value="" required>
         </div>
         <div class="form-group">
            <label for="eventPhoto">Photo</label>
            <div class="photo-preview">
               <img id="photoPreview" src="" alt="" style="width: 150px; height: auto;">
            </div>
            <input type="file" id="eventPhotoUpload" name="event_img" accept="image/*" onchange="previewPhoto()">
         </div>
         <div class="form-group">
            <label for="eventDesc">Description</label>
            <textarea id="eventDesc" name="event_desc" required></textarea>
         </div>
        
         <div class="form-group">
            <label for="eventDate">Event Date</label>
            <input type="date" id="eventDate" name="event_date" value="" required>
         </div>

         <div class="form-group">
            <button onclick="saveEvent()">Save Changes</button>
         </div>
         <div class="form-group">
            <button id="delete">Delete Event</button>
         </div>
      </div>
   </div>
</div>

<script src="js/editEvents.js"></script>
<?php 
    require_once("footer.php")
    ?>
</body>

<?php $conn->close(); ?>

</html>

