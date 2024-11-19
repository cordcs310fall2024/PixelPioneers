<?php
$host = "localhost";
$username = "root";
$dbname = "ClubDatabase";

$conn = new mysqli($host, $username, $password, $dbname); //get database

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} //no connection to database

//get form fields from 
$id = $_POST['id']; //member id
$name = $_POST['name']; //member name
$bio = $_POST['bio']; //member bio

if (!empty($_FILES['photo']['tmp_name'])) { //update photo and fields
    $photo = addslashes(file_get_contents($_FILES['photo']['tmp_name'])); //add slashed to preserve files
    $sql = "UPDATE members SET member_name='$name', member_bio='$bio', member_img='$photo' WHERE ID=$id"; //update in database
} else { //incase you don't update the photo
    $sql = "UPDATE members SET member_name='$name', member_bio='$bio' WHERE ID=$id";//update in database
}

//error logs and message to confirm updated member
if ($conn->query($sql) === TRUE) {
    echo "Member updated successfully.";
} else {
    echo "Error updating member: " . $conn->error;
}

$conn->close(); 
?>
