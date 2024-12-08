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
$host = "localhost";
$username = "root";
$dbname = "ClubDatabase_copy";
$password = "Lennox2000";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT ID, member_name, member_bio, member_img FROM members"; //select all the fields from the database
$result = $conn->query($sql);
?>

<div class="admin-page">
      <!--------------------------- Left Column (sidebar) --------------------------->
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

      <!--------------------------- Middle Column --------------------------->
 <div class="content">
      <div class="middle-column">
         <div class="member-grid">
            <?php if ($result->num_rows > 0): ?> <!---check if there are members in the database---->
               <?php while ($row = $result->fetch_assoc()): ?>        <!-- loop through each member retrieved from the database -->
                  <div class="member-grid-item" 
                       onclick="editMember('<?php echo addslashes($row['member_name']); ?>',  //retrive member name
                                          //retrive member image
                                           'data:image/jpeg;base64,<?php echo base64_encode($row['member_img']); ?>', 
                                           //retrive member bio
                                           '<?php echo addslashes($row['member_bio']); ?>',
                                           //retrieve member id
                                           <?php echo $row['ID']; ?>)">
                      <!-- display photo photo -->
                     <img src="data:image/jpeg;base64,<?php echo base64_encode($row['member_img']); ?>" alt="Member Photo">
                     <div class="middle">
                     <!-- show the member's name  -->
                        <div class="memberName"><?php echo htmlspecialchars($row['member_name']); ?></div>
                     </div>
                  </div>
               <?php endwhile; ?>
            <?php else: ?>
                     <!-- error if no members are found in the table (usually not connecting to table) -->
               <p>No members found.</p>
            <?php endif; ?>
         </div>
      </div>

      <!--------------------------- Right Column --------------------------->
      <div class="right-column">
         <h3>Edit Member</h3>
         <div class="form-group">
            <label for="memberName">Name</label>
            <input type="text" id="memberName" value=""> <!----memberName----->
         </div>
         <div class="form-group">
            <label for="memberPhoto">Photo</label>
            <div class="photo-preview">
               <img id="photoPreview" src="" alt="" style="width: 300px; height: auto;"> <!---styling for photo cuz there are too many css files----->
            </div>
            <!----photoPreview----->
            <input type="file" id="memberPhotoUpload" accept="image/*" onchange="previewPhoto()"> <!----preview using js in editMembers.js----->
         </div>
         <div class="form-group">
            <label for="memberBio">Bio</label>
            <textarea id="memberBio"></textarea> <!----memberBio----->
         </div>
         <div class="form-group">
            <button onclick="saveMember()">Save Changes</button> <!----currently works----->
         </div>
         <div class="form-group">
            <button id="delete" >Delete Member</button> <!---doesn't work  yet------>
         </div>
      </div>
   </div>
</div>

<script src="js/editMembers.js"></script> 

<?php $conn->close(); ?>