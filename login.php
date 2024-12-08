<?php
session_start();  // Start the session to track failed attempts

$host = "localhost";
$username = "root";
$dbname = "ClubDatabase_copy";
$password = "Lennox2000";

// Establish connection
$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$error = "";

// Check if the failed attempts counter is set in the session, if not initialize it
if (!isset($_SESSION['failed_attempts'])) {
    $_SESSION['failed_attempts'] = 0;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login_email = $_POST['first']; // Assuming 'first' is the username/email input field
    $login_pass = $_POST['password'];

    // Prepare and bind query to prevent SQL injection
    $stmt = $conn->prepare("SELECT login_pass FROM login WHERE login_email = ?");
    $stmt->bind_param("s", $login_email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        // Verify password
        if (password_verify($login_pass, $hashed_password)) {
            // Reset failed attempts counter on successful login
            $_SESSION['failed_attempts'] = 0;
            header("Location: editMembers.php"); // Redirect on successful login
            exit();
        } else {
            $_SESSION['failed_attempts']++;  // Increment the failed attempts counter
            $error = "Invalid password.";
        }
    } else {
        $_SESSION['failed_attempts']++;  // Increment the failed attempts counter
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
echo password_hash("test", PASSWORD_DEFAULT);  // username test, password test

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
    </div>
</main>

</body>
</html>
