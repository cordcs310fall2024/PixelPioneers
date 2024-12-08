<?php
$host = "localhost";
$username = "root";
$password = "Lennox2000";
$dbname = "ClubDatabase_copy";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];
$title = $_POST['title'];
$desc = $_POST['desc'];
$date = $_POST['date'];

if (!empty($_FILES['photo']['tmp_name'])) {
    $photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
    $sql = "UPDATE events SET event_title='$title', event_desc='$desc', event_img='$photo', event_date='$date' WHERE ID=$id";
} else {
    $sql = "UPDATE events SET event_title='$title', event_desc='$desc', event_date='$date' WHERE ID=$id";
}

if ($conn->query($sql) === TRUE) {
    echo "Event updated successfully.";
} else {
    echo "Error updating event: " . $conn->error;
}

$conn->close();
?>
