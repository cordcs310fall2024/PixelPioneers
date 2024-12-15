<?php
session_start(); 

require_once('db_config.php');

// Establish connection
$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$error = "";


$timeout_duration = 1200; // 20 minutes in seconds

// Check if the session is already active
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout_duration) {
        session_unset();
        session_destroy();
        header("Location: login.php?timeout=true"); 
        exit();
    }
    // Update last activity timestamp
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

        // Verify password
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

    // Redirect to a fun page after 10 failed attempts
    if ($_SESSION['failed_attempts'] >= 10) {
        header("Location: https://www.youtube.com/watch?v=XB805Ej9ZzM"); // Redirect to YouTube
        exit();
    }

    $stmt->close();
}

// Delete before deploy, this prints out what the hashed password is so you can put it in db
//echo password_hash("test", PASSWORD_DEFAULT);  // username test, password test

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php require_once("header.php"); ?>

<main>
    <div class="main">
        <h1>Admin Login</h1>
        <form method="POST" action="">
            <label for="first">Username:</label>
            <input type="text" id="first" name="first" placeholder="Enter your Username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your Password" required>

            <?php if (!empty($error)): ?>
                <div class="error" style="color: red;"><?php echo $error; ?></div>
            <?php endif; ?>

            <div class="wrap">
                <button type="submit">Submit</button>
            </div>
        </form>

        <?php if (isset($_GET['timeout']) && $_GET['timeout'] === 'true'): ?>
            <div style="color: red;">Your session has expired due to inactivity. Please log in again.</div>
        <?php endif; ?>

    </div>
</main>

</body>
</html>
