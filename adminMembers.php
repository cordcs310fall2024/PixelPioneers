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

      <!-- Right Column - Edit Member Details -->
      <div class="right-column">
         <h3>Edit Member</h3>
         <div class="form-group">
            <label for="memberName">Name</label>
            <input type="text" id="memberName" value="">
         </div>
         <div class="form-group">
            <label for="memberPhoto">Photo</label>
            <div class="photo-preview">
               <img id="photoPreview" src="" alt="" style="width: 150px; height: auto;">
            </div>
            <input type="file" id="memberPhotoUpload" accept="image/*" onchange="previewPhoto()">
         </div>
         <div class="form-group">
            <label for="memberBio">Bio</label>
            <textarea id="memberBio"></textarea>
         </div>
         <div class="form-group">
            <button onclick="saveMember()">Save Changes</button>
         </div>
         <div class="form-group">
            <button id = "delete" >Delete Member</button>
         </div>
      </div>
   </div>
</div>

<script src="js/adminMembers.js"></script>

</body>
</html>
