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

// Decode the incoming JSON request
$data = json_decode(file_get_contents("php://input"), true);
if (!$data || !is_array($data)) {
    echo json_encode(["success" => false, "message" => "Invalid request data."]);
    exit();
}

try {
    // Begin a transaction
    $conn->begin_transaction();

    // Phase 1: Set all `display_order` values to temporary negatives to avoid duplicates
    foreach ($data as $item) {
        $member_id = $conn->real_escape_string($item['member_id']);
        $temporary_order = -($item['display_order']); // Set a temporary negative value
        $sql = "UPDATE memberOrder SET display_order = $temporary_order WHERE member_id = $member_id";
        if (!$conn->query($sql)) {
            throw new Exception("Error during temporary update: " . $conn->error);
        }
    }

    // Phase 2: Update with correct `display_order` values
    foreach ($data as $item) {
        $member_id = $conn->real_escape_string($item['member_id']);
        $display_order = $conn->real_escape_string($item['display_order']);
        $sql = "UPDATE memberOrder SET display_order = $display_order WHERE member_id = $member_id";
        if (!$conn->query($sql)) {
            throw new Exception("Error during final update: " . $conn->error);
        }
    }

    // Commit the transaction
    $conn->commit();
    echo json_encode(["success" => true]);
} catch (Exception $e) {
    // Rollback the transaction on error
    $conn->rollback();
    echo json_encode(["success" => false, "message" => $e->getMessage()]);
}

// Close the connection
$conn->close();


?>
