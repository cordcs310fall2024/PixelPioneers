<?php
require_once('db_config.php');

// Establish database connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $bio = $_POST['bio'];

    if (!empty($_FILES['photo']['tmp_name'])) {
        $photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
    } else {
        echo "Photo upload is required.";
        exit;
    }

    // Start transaction
    $conn->begin_transaction();

    try {
        // Insert into the members table
        $sql = "INSERT INTO members (member_name, member_bio, member_img) VALUES ('$name', '$bio', '$photo')";
        if ($conn->query($sql) === TRUE) {
            // Get the last inserted member ID
            $member_id = $conn->insert_id;

            // Get the current maximum display_order from memberOrder
            $maxDisplayOrderQuery = "SELECT MAX(display_order) AS max_order FROM memberOrder";
            $result = $conn->query($maxDisplayOrderQuery);

            if ($result) {
                $row = $result->fetch_assoc();
                $nextDisplayOrder = $row['max_order'] ? $row['max_order'] + 1 : 1; // If no rows, start from 1
            } else {
                throw new Exception("Error fetching max display_order: " . $conn->error);
            }

            // Insert into the memberOrder table with the calculated display_order
            $orderSql = "INSERT INTO memberOrder (member_id, display_order) VALUES ('$member_id', $nextDisplayOrder)";
            if ($conn->query($orderSql) !== TRUE) {
                throw new Exception("Error adding to memberOrder: " . $conn->error);
            }

            // Commit the transaction
            $conn->commit();
            echo "New member added successfully and added to memberOrder.";
        } else {
            throw new Exception("Error adding member: " . $conn->error);
        }
    } catch (Exception $e) {
        // Rollback transaction on error
        $conn->rollback();
        echo "Transaction failed: " . $e->getMessage();
    }
} else {
    echo "Invalid request.";
}

// Close connection
$conn->close();
?>
