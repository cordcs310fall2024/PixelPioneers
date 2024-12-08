<?php
$host = "localhost";
$username = "root";
$password = "Lennox2000"; // Adjust based on your setup
$dbname = "ClubDatabase_copy";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $name = $_POST['name'];
   $bio = $_POST['bio'];

   if (!empty($_FILES['photo']['tmp_name'])) {
      $photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
   } else {
      echo "Photo upload is required.";
      exit;
   }

   $sql = "INSERT INTO members (member_name, member_bio, member_img) VALUES ('$name', '$bio', '$photo')";

   if ($conn->query($sql) === TRUE) {
      echo "New member added successfully.";
   } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
   }
} else {
   echo "Invalid request.";
}

$conn->close();
?>
