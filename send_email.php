<?php  
// form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// email variables
$to = //club email
$subject = "Form Submission from $name";
$headers = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=utf-8\r\n";

// email 
$body = "Message from Entrepreurship Club contact form:\n\n";
$body .= "Name: $name\n";
$body .= "Email: $email\n";
$body .= "Message: $message\n";

/* confirmation page
if (mail($to, $subject, $body, $headers)) {
    header("Location: confirmation.php");
    exit();
} else {
    echo "Failed to send the message. Please try again.";
}
?>
*/
