<?php
$host = "localhost";
$username = "root";
$dbname = "ClubDatabase";
$password = "";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $memberId = intval($_POST['memberID']);
    error_log("Received memberID: " . $_POST['memberID']);
    
    $sql = "DELETE FROM members WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $memberId);
    
    if ($stmt->execute()) {
        echo "Member deleted successfully.";
    } else {
        echo "Error deleting member: " . $conn->error;
    }
    
    $stmt->close();
}

$conn->close();
?>
