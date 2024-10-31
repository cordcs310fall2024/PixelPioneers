<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Project</title>
    <!-- Bootstrap Icons CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="css/adminMemberEvent.css"> 
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <?php 
    require_once("header.php")
    ?>
    
<!-- -------------------- MAIN CONTENT ---------------------->
<main>
    <div id="editForm" class="editFormEvent"> 
        <form>
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" required><br><br>
        
            <label for="date">Date:</label><br>
            <input type="date" id="date" name="date" required><br><br>
        
            <label for="description">Description:</label><br>
            <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>
        
            <label for="image">Upload Image:</label><br>
            <input type="file" id="image" name="image" accept="image/*" required><br><br>
        
            <button type="submit">Submit</button>
        </form>
    </div>
</main>

<!-- -------------------- JAVASCRIPT ---------------------->
<script>
    function openNav() {
      document.getElementById("mySidebar").style.width = "250px";
      document.getElementById("main").style.marginLeft = "250px";
    }
    
    function closeNav() {
      document.getElementById("mySidebar").style.width = "0";
      document.getElementById("main").style.marginLeft = "0";
    }
</script>
</body>
</html>