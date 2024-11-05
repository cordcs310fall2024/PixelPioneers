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
   </div>

   <!-- Content area -->
   <div class="content">
      <!-- Middle Column - Members Grid -->
      <div class="middle-column">
         <div class="member-grid">
            <div class="member-grid-item" onclick="editMember('John Doe', 'img/ferrets/ferret1.png', 'Lorem ipsum dolor sit amet...')">
               <img src="img/ferrets/ferret1.png" alt="Member Photo">
               <div class="middle">
                  <div class="memberName">John Doe</div>
               </div>
            </div>
            <div class="member-grid-item" onclick="editMember('Jane Smith', 'img/ferrets/ferret2.png', 'Consectetur adipiscing elit...')">
               <img src="img/ferrets/ferret2.png" alt="Member Photo">
               <div class="middle">
                  <div class="memberName">Jane Smith</div>
               </div>
            </div>
            <div class="member-grid-item" onclick="editMember('John Doe', 'img/ferrets/ferret1.png', 'Lorem ipsum dolor sit amet...')">
               <img src="img/ferrets/ferret1.png" alt="Member Photo">
               <div class="middle">
                  <div class="memberName">John Doe</div>
               </div>
            </div>
            <div class="member-grid-item" onclick="editMember('Jane Smith', 'img/ferrets/ferret2.png', 'Consectetur adipiscing elit...')">
               <img src="img/ferrets/ferret2.png" alt="Member Photo">
               <div class="middle">
                  <div class="memberName">Jane Smith</div>
               </div>
            </div>
            <!-- Add more members here -->
         </div>
      </div>
   </div>
</div>

<script src="js/addMember.js"></script>

</body>
</html>
