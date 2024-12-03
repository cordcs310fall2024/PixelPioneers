<?php
 require_once('db_config.php');

$conn = new mysqli($host, $username, $password, $dbname);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Read the raw POST data
    $data = json_decode(file_get_contents('php://input'), true);

    // Debug: Check the received data
    if ($data) {
        // Print the data for debugging
        error_log(print_r($data, true));
    }

    if (isset($data['id'])) {
        $id = $data['id'];

        // Database connection
        $conn = new mysqli($host, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Delete the event
        $sql = "DELETE FROM events WHERE ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Event deleted successfully!";
        } else {
            echo "Failed to delete event.";
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "No event ID provided.";
    }
}
?>
