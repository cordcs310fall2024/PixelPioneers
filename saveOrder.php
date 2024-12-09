<?php
$host = "localhost";
$username = "root";
$dbname = "ClubDatabase";
$password = "";

error_reporting(E_ALL);
ini_set('display_errors', 1);


$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve and decode JSON data from the request
$data = json_decode(file_get_contents("php://input"), true);

if ($data) {
    $success = true;

    foreach ($data as $item) {
        $member_id = intval($item['member_id']);
        $display_order = intval($item['display_order']);

        $sql = "UPDATE memberOrder SET display_order = ? WHERE member_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $display_order, $member_id);

        if (!$stmt->execute()) {
            $success = false;
            break;
        }
    }

    echo json_encode(["success" => $success]);
} else {
    echo json_encode(["success" => false]);
}

$conn->close();
?>
