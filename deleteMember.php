<?php
header('Content-Type: application/json');

// Database connection
$host = "localhost";
$username = "root";
$password = "";
$dbname = "ClubDatabase";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Database connection failed."]);
    exit();
}

// Get memberID from the POST request
$data = json_decode(file_get_contents("php://input"), true);
if (!isset($data['memberID'])) {
    echo json_encode(["success" => false, "message" => "Invalid request."]);
    exit();
}

$memberID = $conn->real_escape_string($data['memberID']);

// Begin transaction to ensure atomicity
$conn->begin_transaction();

try {
    // Delete the member from `memberOrder` table where member_id matches
    $sqlDeleteOrder = "DELETE FROM memberOrder WHERE member_id = $memberID";
    if (!$conn->query($sqlDeleteOrder)) {
        throw new Exception("Error deleting from memberOrder: " . $conn->error);
    }

    // Then delete the member from `members` table where ID matches
    $sqlDeleteMember = "DELETE FROM members WHERE ID = $memberID";
    if (!$conn->query($sqlDeleteMember)) {
        throw new Exception("Error deleting from members: " . $conn->error);
    }

    // Commit the transaction
    $conn->commit();

    echo json_encode(["success" => true]);
} catch (Exception $e) {
    // Rollback the transaction on error
    $conn->rollback();
    echo json_encode(["success" => false, "message" => $e->getMessage()]);
}

$conn->close();
?>
