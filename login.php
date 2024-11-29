<?php
session_start(); 

$host = "localhost";
$username = "root";
$dbname = "ClubDatabase";
$password = "";

// Establish connection
$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$error = "";

// Set session timeout duration (20 minutes = 1200 seconds)
$timeout_duration = 1200;


if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout_duration) {
        // Destroy session if inactive for more than 20 minutes
        session_unset();
        session_destroy();
        header("Location: login.php?timeout=true"); 
        exit();
    }

    $_SESSION['last_activity'] = time();
}

if (!isset($_SESSION['failed_attempts'])) {
    $_SESSION['failed_attempts'] = 0;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login_email = $_POST['first'];
    $login_pass = $_POST['password'];

    $stmt = $conn->prepare("SELECT login_pass FROM login WHERE login_email = ?");
    $stmt->bind_param("s", $login_email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        if (password_verify($login_pass, $hashed_password)) {
            $_SESSION['failed_attempts'] = 0;

            $_SESSION['logged_in'] = true;
            $_SESSION['last_activity'] = time();
            header("Location: editMembers.php"); 
            exit();
        } else {
            $_SESSION['failed_attempts']++;
            $error = "Invalid password.";
        }
    } else {
        $_SESSION['failed_attempts']++; 
        $error = "User not found";
    }
    //fun
    if ($_SESSION['failed_attempts'] >= 10) {
        header("Location: https://www.youtube.com/watch?v=cvh0nX08nRw"); // Redirect to YouTube
        exit();
    }

    $stmt->close();
}

//delete before deploy, this prints out what the hashed password is so you can put it in db
echo password_hash("test", PASSWORD_DEFAULT);  

$conn->close();
?>
