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

<div class="admin-page">
   <!-- Sidebar for actions -->
   <div class="sidebar">
      <button onclick="window.location.href='orderMembers.php'">Order Members</button>
      <button onclick="window.location.href='adminMembers.php'">Edit Members</button>
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

      <!-- Right Column - Edit Member Details -->
      <div class="right-column">
         <h3>Edit Member</h3>
         <div class="form-group">
            <label for="memberName">Name</label>
            <input type="text" id="memberName" value="">
         </div>
         <div class="form-group">
            <label for="memberPhoto">Photo URL</label>
            <input type="text" id="memberPhoto" value="">
         </div>
         <div class="form-group">
            <label for="memberBio">Bio</label>
            <textarea id="memberBio"></textarea>
         </div>
         <div class="form-group">
            <button onclick="saveMember()">Save Changes</button>
         </div>
      </div>
   </div>
</div>

<script src="js/adminMembers.js"></script>

</body>
</html>
