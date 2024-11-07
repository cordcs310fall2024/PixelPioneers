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
<div class = "page">
    <div class="contact-container">
        <form>
            <h2>Get In Touch</h2>
            <hr />
            <label for="name"></label><br>
            <input type="text" id="name" name="name" placeholder="Name"> <br>

            <label for="email"></label><br>
            <input type="email" id="email" name="email" placeholder="Email"> <br>

            <label for="message"></label>
            <textarea id="message" name="message" placeholder="Message"></textarea>

            <input type="submit" value="Submit">

        </form>
        <div class = "contact-right">
            <img src = "img/contactImg/fullImage.png" alt = "">
        </div>
    </div>
 </div>
</body>
</html>
