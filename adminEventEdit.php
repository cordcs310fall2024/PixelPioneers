<?php
require_once("header.php");
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

require_once('db_config.php');

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the event ID from the form (hidden input)
    $event_id = $_POST['event_id'];
    
    // Get the values from the form (or keep them as they are if empty)
    $event_title = !empty($_POST['event_title']) ? $_POST['event_title'] : null;
    $event_desc = !empty($_POST['event_desc']) ? $_POST['event_desc'] : null;
    $event_date = !empty($_POST['event_date']) ? $_POST['event_date'] : null;
    
    // Check if a new image was uploaded
    if (!empty($_FILES['event_img']['name'])) {
        $event_img = $_FILES['event_img']['tmp_name'];
        // Process the image (convert to base64 or store it as needed)
        $event_img = base64_encode(file_get_contents($event_img)); // example
    } else {
        $event_img = null; // If no new image, keep existing image
    }
    
    // Prepare SQL to update event
    $sql = "UPDATE events SET ";
    if ($event_title !== null) {
        $sql .= "event_title = '$event_title', ";
    }
    if ($event_desc !== null) {
        $sql .= "event_desc = '$event_desc', ";
    }
    if ($event_date !== null) {
        $sql .= "event_date = '$event_date', ";
    }
    if ($event_img !== null) {
        $sql .= "event_img = '$event_img', ";
    }
    
    // Remove trailing comma and finish SQL query
    $sql = rtrim($sql, ', ') . " WHERE ID = $event_id";
    
    if ($conn->query($sql) === TRUE) {
        // Redirect or provide feedback
        header("Location: adminEventEdit.php?success=1");
        exit();
    } else {
        echo "Error updating event: " . $conn->error;
    }
}

$sql = "SELECT ID, event_title, event_desc, event_img, event_date FROM events";
$result = $conn->query($sql);

?>

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
$password = "Lennox2000";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT ID, event_title, event_desc, event_img, event_date FROM events";
$result = $conn->query($sql);
?>

<!-- Sidebar for actions -->
<div class="admin-page">
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
            <form method="POST" action="editEvent.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="eventTitle">Title</label>
                    <input type="text" id="eventTitle" name="event_title" value="">
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
                    <textarea id="eventDesc" name="event_desc"></textarea>
                </div>
                <div class="form-group">
                    <label for="eventDate">Event Date</label>
                    <input type="date" id="eventDate" name="event_date" value="">
                </div>
                <div class="form-group">
                    <input type="hidden" name="event_id" id="event_id">
                    <button type="submit" name="save" value="1">Save Changes</button>
                </div>
            </form>

            <!-- Delete Form -->
            <form method="POST" action="deleteEvent.php">
                <input type="hidden" name="event_id" id="delete_event_id">
                <div class="form-group">
                    <button type="submit" name="delete" value="1" onclick="return confirm('Are you sure you want to delete this event?')">Delete Event</button>
                </div>
            </form>
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

<?php
$conn->close();
?>
