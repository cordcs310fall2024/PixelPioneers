<?php
require_once('db_config.php');

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];
$name = $_POST['name'];
$bio = $_POST['bio'];

if (!empty($_FILES['photo']['tmp_name'])) {
    $photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
    $sql = "UPDATE members SET member_name='$name', member_bio='$bio', member_img='$photo' WHERE ID=$id";
} else {
    $sql = "UPDATE members SET member_name='$name', member_bio='$bio' WHERE ID=$id";
}

if ($conn->query($sql) === TRUE) {
    echo "Member updated successfully.";
} else {
    echo "Error updating member: " . $conn->error;
}

$conn->close();
?>
