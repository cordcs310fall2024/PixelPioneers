<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Project</title>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">

   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/members.css">
</head>
<body>

<?php 
require_once("header.php");

// Database configuration
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "ClubDatabase";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!---------------------- CONTENT ---------------------->
<div class="pageTotal">
<main>
    <div class="top-section">
        <h1>Meet Our Members</h1>
    </div>
 
    <div class="member-grid">
        <?php
        // Get members from the database, ordered by display_order
        $sql = "SELECT m.member_name, m.member_bio, m.member_img 
                FROM members m
                JOIN memberOrder mo ON m.ID = mo.member_id
                ORDER BY mo.display_order ASC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output each member
            while ($row = $result->fetch_assoc()) {
                $member_name = htmlspecialchars($row['member_name'], ENT_QUOTES, 'UTF-8');
                $member_bio = htmlspecialchars($row['member_bio'], ENT_QUOTES, 'UTF-8');
                $member_img = base64_encode($row['member_img']); // Encode binary data to Base64

                echo '<div class="member-grid-item">';
                echo '<img src="data:image/jpeg;base64,' . $member_img . '" alt="' . $member_name . '">';
                echo '<div class="middle">';
                echo '<div class="memberName">' . $member_name . '</div>';
                echo '<div class="memberDescription">' . $member_bio . '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "<p>No members found.</p>";
        }

        $conn->close();
        ?>
    </div>
 </main>
</div>


<?php 
require_once("footer.php");
?>
</body>
</html>
