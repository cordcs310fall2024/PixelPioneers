<?php  
// Form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Email variables
$to = "club@example.com"; // Replace with the club email address
$subject = "Form Submission from $name";
$headers = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=utf-8\r\n";

// Email body
$body = "Message from Entrepreneurship Club contact form:\n\n";
$body .= "Name: $name\n";
$body .= "Email: $email\n";
$body .= "Message: $message\n";

// Simulate success flag for localhost
if (!empty($name) && !empty($email) && !empty($message)) {
    // Redirect to the confirmation page
    header("Location: contact.php?status=success");
    exit();
} else {
    echo "<p>Failed to submit the message. Please fill out all fields.</p>";
}
