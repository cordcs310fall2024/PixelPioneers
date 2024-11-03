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
        <form action="" class = "contact-left">
            <div class = "contact-left-title">
            <h2>Get in touch</h2>
            <hr>
            </div> 
            <input type="text" name = "name" placeholder = "Your Name" class = "contact-inputs" required>
            <input type = "text" name = "email" placehoder = "Your Email" class = "contact-inputs" required>
            <textarea name = "message" placeholder = "Your Message" class = "contact-inputs"></textarea>
            <button type = "submit" >Submit </button>
        </form>
        <div class = "contact-right">

        <img src = "img/contactImg/wave.png" alt = "">


        </div>
    
    </div>

</body>
</html>
