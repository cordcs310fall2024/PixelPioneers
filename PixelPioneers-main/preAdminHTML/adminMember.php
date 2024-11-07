<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Project</title>
    <!-- Bootstrap Icons CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/adminMemberEvent.css"> 
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

    <?php 
    require_once("header.php")
    ?>
    
<!-- -------------------- MAIN CONTENT ---------------------->
<main>
    <h1>Members List</h1>
    <ol id="List">
        <li>
            <img src="img/ferrets/ferret5.png" alt="Member 1">
            <span>Member 1</span>
            <div class="actions">
                <button><a href="adminMemberEdit.html">Edit</a></button>
                <button>Delete</button>
            </div>
        </li>
        <!-- add more list items as needed -->
    </ol>
    <div class="add">
        <a href="adminMemberAdd.html">
            <button>Add Member</button>
          </a>
        
      </div>
</main>

</body>
</html>
