<?php
$host = "localhost";
$username = "root";
$password = ""; // Adjust based on your setup
$dbname = "ClubDatabase";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $title = $_POST['title'];
   $desc = $_POST['desc'];
   $date = $_POST['date'];

   if (!empty($_FILES['photo']['tmp_name'])) {
      $photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
   } else {
      echo "Photo upload is required.";
      exit;
   }

   $sql = "INSERT INTO events (event_title, event_desc, event_img, event_date) VALUES ('$title', '$desc', '$photo', '$date')";

   if ($conn->query($sql) === TRUE) {
      echo "New event added successfully.";
   } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
   }
} else {
   echo "Invalid request.";
}

$conn->close();
?>
