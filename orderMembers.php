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
      <!-- Middle Column - Members Grid -->
      <div class="middle-column">
         <div class="member-grid">
            <div class="member-grid-item" onclick="editMember('Barbarian', 'img/ferrets/ferret1.png', 'Lorem ipsum dolor sit amet...')">
               <img src="img/ferrets/ferret1.png" alt="Member Photo">
               <div class="middle">
                  <div class="memberName">Barbarian</div>
               </div>
            </div>
            <div class="member-grid-item" onclick="editMember('Crusader', 'img/ferrets/ferret2.png', 'Consectetur adipiscing elit...')">
               <img src="img/ferrets/ferret2.png" alt="Member Photo">
               <div class="middle">
                  <div class="memberName">Crusader</div>
               </div>
            </div>
            <div class="member-grid-item" onclick="editMember('Demon Hunter', 'img/ferrets/ferret3.png', 'Lorem ipsum dolor sit amet...')">
               <img src="img/ferrets/ferret3.png" alt="Member Photo">
               <div class="middle">
                  <div class="memberName">Demon Hunter</div>
               </div>
            </div>
            <div class="member-grid-item" onclick="editMember('Monk', 'img/ferrets/ferret4.png', 'Consectetur adipiscing elit...')">
               <img src="img/ferrets/ferret4.png" alt="Member Photo">
               <div class="middle">
                  <div class="memberName">Monk</div>
               </div>
            </div>
            <div class="member-grid-item" onclick="editMember('Necromancer', 'img/ferrets/ferret5.png', 'Consectetur adipiscing elit...')">
               <img src="img/ferrets/ferret5.png" alt="Member Photo">
               <div class="middle">
                  <div class="memberName">Necromancer</div>
               </div>
            </div>
            <div class="member-grid-item" onclick="editMember('Witch Doctor', 'img/ferrets/ferret1.png', 'Lorem ipsum dolor sit amet...')">
               <img src="img/ferrets/ferret1.png" alt="Member Photo">
               <div class="middle">
                  <div class="memberName">Witch Doctor</div>
               </div>
            </div>
            <div class="member-grid-item" onclick="editMember('Wizard', 'img/ferrets/ferret2.png', 'Consectetur adipiscing elit...')">
               <img src="img/ferrets/ferret2.png" alt="Member Photo">
               <div class="middle">
                  <div class="memberName">Wizard</div>
               </div>
            </div>
            <div class="member-grid-item" onclick="editMember('The Nephalem', 'img/ferrets/ferret3.png', 'Consectetur adipiscing elit...')">
               <img src="img/ferrets/ferret3.png" alt="Member Photo">
               <div class="middle">
                  <div class="memberName">The Nephalem</div>
               </div>
            </div>
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
                     <li draggable="true">John Smith</li>
                     <li draggable="true">Jane Doe</li>
                     <li draggable="true">Fred Kruger</li>
                     <li draggable="true">Robert Smith</li>
                     <li draggable="true">Maria Rodriguez</li>
                     <li draggable="true">Mary Smith</li>
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
