<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/contact.css"> 
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>

<?php 
require_once("header.php")
?>

<!---------------------- CONTENT ---------------------->
    <main>
    </main>
    <div class="contact-container">
    <div class="contact-form">
    <h2>Contact Us</h2>
    <form action="#" method="POST">
      <div class="form-group">
        <input type="text" id="name" name="name" placeholder=" " required>
        <label for="name">Name</label>
      </div>

      <div class="form-group">
        <input type="email" id="email" name="email" placeholder=" " required>
        <label for="email">Email</label>
      </div>

      <div class="form-group">
        <textarea id="message" name="message" placeholder=" " required></textarea>
        <label for="message">Message</label>
      </div>

      <button type="submit">Submit</button>
    </form>
  </div>
        <div class = "contact-right">

        <img src = "img/contactImg/wave.png" alt = "">


        </div>
    
    </div>

</body>
</html>
