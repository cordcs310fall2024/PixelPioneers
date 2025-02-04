<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Project</title>
     <!-- Bootstrap Icons CDN -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<noscript>
    <meta http-equiv="refresh" content="0; URL=enable-js.php">
</noscript>

<?php
// Database connection details
$host = "localhost";
$username = "root";
$password = "";
$dbname = "ClubDatabase";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch the two soonest events
$sql = "SELECT event_title, event_date, event_desc, event_img FROM events WHERE event_date >= CURDATE() ORDER BY event_date ASC LIMIT 2";
$result = $conn->query($sql);

// Fetch the events into an array for later use
$events = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $events[] = $row;
    }
}
$conn->close();
?>

<?php 
require_once("header.php")
?>

<!---------------------- CONTENT ---------------------->
    <main>
        <img src="img/ClubImage.png" alt="backHome" class="homeImg">
        <div class="ovalContainer">
        <p class="ovalText"></p>
        </div>
        <!------About Section--->
        <div class="about">
            <div class="txtContainer">
              <div class="title">
                <h1>What do we do?</h1>
              </div>
              <a href="about.php" class="AboutLink">Read More</a>
            </div>
            <div class="imgContainer">
              <img src="img/ActualPhotos/table.jpeg" alt="aboutHome"> 
            </div>
            <div class="pContainer">
              <p>
                The Entrepreneurship Club is a student organization intended to compliment the entrepreneurial curriculum offered at the Offutt School of Business 
                while further contributing to the entrepreneurial spirit of Concordia College. 
                The club provides students with tangible resources that expose, expand, and elucidate the entrepreneurial journey
                intended to prepare each student for successful entrepreneurial pursuits.
              </p>
            </div>
          </div>
          <!----Events Page-->
          <div class="event">
    <div class="leftSide">
        <div class="title">
            <h1>Events</h1>
        </div>
        <div class="recentEvents">
            <h2>Coming Up</h2>
            <?php if (!empty($events)): ?>
                <?php foreach ($events as $event): ?>
                    <div class="event-item">
                        <p>
                            <?php echo htmlspecialchars($event['event_title']); ?><br>
                            <?php echo date('m/d/Y', strtotime($event['event_date'])); ?><br>
                            <?php echo htmlspecialchars($event['event_desc']); ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No upcoming events found.</p>
            <?php endif; ?>
        </div>
    </div>
    <div class="rightSide">
        <div class="imgContainer">
            <img src="img\ActualPhotos/schedule.jpeg" alt="eventHome">
        </div>
        <a href="schedule.php" class="EventLink">Schedule</a>
    </div>
</div>

           <!----Contact Page-->
           <div class="contact">
            <div class="txtContainer">
              <div class="contactImgContainer">
                <img src="img/programsImage.png" alt="contactHome"> 
              </div>
              <div class="title">
                <h1>Join Us!</h1>
              </div>
            <div class="pContainer">
              <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
              Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut 
              aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.
              </p>
            </div>
                <a href="contact.php" class="ContactLink">Read More</a>
            </div>
          </div>
          </div>
    </main>
    <?php 
    require_once("footer.php")
    ?>
</body>
</html>
