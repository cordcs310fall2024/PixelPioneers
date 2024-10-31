<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Project</title>
     <!-- Bootstrap Icons CDN -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css"> 

    
    <style>
      .adminLinks {
        position: absolute;
        top: 100px;
        left: 0;
        padding: 40px;
      }
      
      .adminLinks ul {
        list-style: none;
        padding: 0;
        margin: 0;
      }
      
      .adminLinks li {
        margin-bottom: 20px; /* Add space between the two options */
      }
      
      .adminLinks a {
        text-decoration: none;
        color: #000000;
        font-size: 24px;
      }
      
      .adminLinks a:hover {
        color: #6f1d46;
        text-decoration: underline;
      }
      
      .adminLinks a:before {
        content: "\2022"; /* Add a dot before each link */
        margin-right: 10px;
        color: #6f1d46;
      }
    </style>
</head>
<body>

<?php 
  require_once("header.php")
  ?>
  

<!---------------------- ADMIN LINKS ---------------------->
<div class="adminLinks">
  <ul>
    <li><a href="adminMember.html" class="addMember">Add/edit Member</a></li>
    <li><a href="adminEvent.html" class="addEvent">Add/edit Event</a></li>
  </ul>
</div>

</body>
</html>