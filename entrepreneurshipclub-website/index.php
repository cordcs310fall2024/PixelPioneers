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
              <a href="about.html" class="AboutLink">Read More</a>
            </div>
            <div class="imgContainer">
              <img src="img/ferrets/ferret2.png" alt="aboutHome"> 
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
                <div class="event-item">
                  <img src="img/ferrets/ferret4.png" alt="recentEvents1">
                  <p>
                    Super Cool Event<br>
                    10/17/2024<br>
                    Where you are standing
                  </p>
                </div>
                <div class="event-item">
                  <img src="img/ferrets/ferret5.png" alt="recentEvents2">
                  <p>
                    Website Launches<br>
                    12/20/2024<br>
                    Offut School of Business
                  </p>
                </div>
              </div>
            </div>
            <div class="rightSide">
              <div class="imgContainer">
                <img src="img/ferrets/ferret3.png" alt="eventHome"> 
              </div>
              <a href="schedule.html" class="EventLink">Schedule</a>
            </div>
          </div>
           <!----Contact Page-->
           <div class="contact">
            <div class="txtContainer">
              <div class="contactImgContainer">
                <img src="img/ferrets/ferret5.png" alt="contactHome"> 
              </div>
              <div class="title">
                <h1>Join Us!</h1>
              </div>
            <div class="pContainer">
              <p>
                Are you passionate about turning ideas into reality? Join the Entrepreneurship Club!
            This dynamic student organization is designed to enhance your entrepreneurial skills beyond the classroom. 
            By joining, you'll gain access to invaluable resources, hands-on experiences, and networking opportunities that will guide you on your entrepreneurial journey. 
            Whether you're looking to start your own business or simply want to explore innovative thinking, the club prepares you for success in whatever path you choose. 
            Come be part of Concordia College’s vibrant entrepreneurial spirit!
              </p>
            </div>
            <a href="contact.html" class="ContactLink">Read More</a>
            </div>
          </div>
          </div>
    </main>

<!---------------------- JavaScript ---------------------->
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
