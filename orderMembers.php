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

      <!-- Right Column - ORDER MEMBER -->
      <div class="right-column">
   <div class = rightHeader>
         <h2>Reorder Members</h2>
         <div class="form-group">
                  <button onclick="saveOrder()">Save Changes</button>
         </div>
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


</body>
</html>
