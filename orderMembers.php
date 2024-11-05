<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Order Members</title>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/orderMembers.css">

</head>
<body>

<div class="admin-page">
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
      </div>


      <div class="right-column">
      <div class="draggable-item" draggable="true" id="item1">Item 1</div>
    <div class="draggable-item" draggable="true" id="item2">Item 2</div>
    <div class="draggable-item" draggable="true" id="item3">Item 3</div>
    <div class="draggable-item" draggable="true" id="item4">Item 4</div>
      </div>


      <script src="js/orderMembers.js"></script>
      </body>
      </html>