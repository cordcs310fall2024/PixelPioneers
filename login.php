<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Project</title>
     <!-- Bootstrap Icons CDN -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="css/login.css"> 
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php 
require_once("header.php")
?>

<!---------------------- CONTENT ---------------------->

    <main>
        <head>
            <title>HTML Login Form</title>
            <link rel="stylesheet" href="style.css">
        </head>

        <body>
            <div class="main">
                <h1>Admin</h1>
                <form action="admin.php">
                    <label for="first">
                        Username:
                    </label>
                    <input type="text" 
                           id="first" 
                           name="first" 
                           placeholder="Enter your Username" required>
        
                    <label for="password">
                        Password:
                    </label>
                    <input type="password"
                           id="password" 
                           name="password"
                           placeholder="Enter your Password" required>
        
                    <div class="wrap">
                        <button type="submit">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </body>
    </main>


</body>
</html>
