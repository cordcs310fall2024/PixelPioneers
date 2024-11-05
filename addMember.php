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
    <div class = "content">
   <form id="member-form">
             <h1>Add Member</h1>
            <div class="form-group">
                <input type="text" id="name" name="name" required>
                <label for="name">Name</label>
            </div>

            <div class="form-group">
                <textarea id="bio" name="bio" rows="4" required></textarea>
                <label for="bio">Bio</label>
            </div>

            <div class="form-group">
                <input type="file" id="photo" name="photo" accept="image/*" required>
                <label for="photo">Upload Photo</label>
            </div>

            <button type="submit">Submit</button>
        </form>
        </div>
</div>

</body>
</html>
