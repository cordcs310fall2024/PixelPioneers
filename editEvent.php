<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {
    // Get form data
    $eventId = $_POST['event_id'];
    $eventTitle = $_POST['event_title'];
    $eventDesc = $_POST['event_desc'];
    $eventDate = $_POST['event_date'];

    // Handle image upload if there's a new image
    if (isset($_FILES['event_img']) && $_FILES['event_img']['error'] === UPLOAD_ERR_OK) {
        $imgData = file_get_contents($_FILES['event_img']['tmp_name']);
        $imgBase64 = base64_encode($imgData);
    } else {
        // Use the existing image in the database
        $imgBase64 = null;
    }

    // Database connection
    require_once('db_config.php');
    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update event query
    $sql = "UPDATE events SET event_title = ?, event_desc = ?, event_date = ?";
    
    if ($imgBase64) {
        $sql .= ", event_img = ?";
    }
    
    $sql .= " WHERE ID = ?";

    $stmt = $conn->prepare($sql);

    if ($imgBase64) {
        $stmt->bind_param("ssssi", $eventTitle, $eventDesc, $eventDate, $imgBase64, $eventId);
    } else {
        $stmt->bind_param("sssi", $eventTitle, $eventDesc, $eventDate, $eventId);
    }

    if ($stmt->execute()) {
        echo "Event updated successfully";
        header("Location: adminEventEdit.php");
        exit();
    } else {
        echo "Error updating event: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
