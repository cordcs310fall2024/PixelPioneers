<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css"> 
    <link rel="stylesheet" href="css/contact.css"> 
</head>
<body>

<?php 
require_once("header.php")
?>

<!---------------------- CONTENT ---------------------->
    <main>
        <h1>Contact</h1>
    </main>
    <div class="contact-container">
        <h2>Contact Us</h2>
        <img src="img/contactImg/startup.jpg" alt="Contact Us" class="header-image"> <!-- Image below heading -->
        <form class="contact-form">
            <label for="first-name">First Name:</label>
            <input type="text" id="first-name" name="first-name" required>
    
            <label for="last-name">Last Name:</label>
            <input type="text" id="last-name" name="last-name" required>
    
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
    <!-------

    <label>Reason for Contact:</label>
            <div class="radio-group">
                <div class="radio-item">
                    <input type="radio" id="inquiry" name="reason" value="Inquiry" required>
                    <label for="inquiry">Inquiry</label>
                </div>
                <div class="radio-item">
                    <input type="radio" id="feedback" name="reason" value="Feedback" required>
                    <label for="feedback">Feedback</label>
                </div>
                <div class="radio-item">
                    <input type="radio" id="support" name="reason" value="Support" required>
                    <label for="support">Support</label>
                </div>
            </div>

             --------->
    
            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>
    
            <div class="checkbox-group">
                <input type="checkbox" id="newsletter" name="newsletter">
                <label for="newsletter"></label>
            </div> 
    
            

            <button type="submit">Submit</button>
    

            
        </form>
    </div>

</body>
</html>
