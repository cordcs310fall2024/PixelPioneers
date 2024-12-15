<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/orderMembers.css">

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

$sql = "SELECT m.ID, m.member_name, m.member_bio, m.member_img, mo.display_order 
        FROM members m
        JOIN memberOrder mo ON m.ID = mo.member_id
        ORDER BY mo.display_order";
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
          <!-- Middle Column -->
          <div class="middle-column">
          <div class="member-grid">
            <?php if ($result->num_rows > 0): ?>
               <?php while ($row = $result->fetch_assoc()): ?>
                  <div class="member-grid-item">
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($row['member_img']); ?>" alt="Member Photo">
                        <div class="middle">
                           <div class="memberName"><?php echo htmlspecialchars($row['member_name']); ?></div>
                        </div>
                  </div>
               <?php endwhile; ?>
            <?php else: ?>
               <p>No members found.</p>
            <?php endif; ?>
</div>
      </div>
      <!-- Right Column - ORDER MEMBER -->
      <div class="right-column">

            <h2>Reorder Members</h2>
            <div class="form-group">
                     <button onclick="saveOrder()">Save Changes</button>

            </div>
            <div class="sortable-list">
    <ul id="sortable">
        <?php 
        // Reset the result pointer to reuse it
        $result->data_seek(0); 
        while ($row = $result->fetch_assoc()): ?>
            <li draggable="true" data-id="<?php echo $row['ID']; ?>">
                <?php echo htmlspecialchars($row['member_name']); ?>
            </li>
        <?php endwhile; ?>
    </ul>
</div>
      </div>
  </div>
</div>

<script src="js/orderMembers.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>

<?php 
    require_once("footer.php")
    ?>
    
</body>
</html>
