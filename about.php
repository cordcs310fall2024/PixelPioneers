<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Project</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
   <link rel="stylesheet" href="css/about.css">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php 
require_once("header.php")
?>

<!---------------------- CONTENT ---------------------->

<body>
<div class = "pageTotal">
<main>
    <div class = "top-section">
      <div id = "title">
            <h1>The Entrepreneurship <br>Club<br></h1>
        </div>
        <div class="custom-shape-divider-bottom-1729120949">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
            </svg>
        </div>
    </div>
    <div class="mission-button-wrapper">
        <button class="mission-button">
            <span class="button-text">Our Mission Statement</span>
            <p class="mission-content">
                "The Entrepreneurship Club is a student organization 
                intended to complement the entrepreneurial curriculum offered at the 
                Offutt School of Business while further contributing to the entrepreneurial 
                spirit of Concordia College. The club provides students with tangible resources 
                that expose, expand, and elucidate the entrepreneurial 
                journey intended to prepare each student for successful entrepreneurial pursuit."
            </p>
        </button>
    </div>
<!---------------------- CONTAINER 1 MEMBERS---------------------->
   <div class = "container">
       <div class = "contentMembers">
           <div>
               <h1>Our Members</h1>
               <p>
                   Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                   sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                   Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                   Lorem ipsum dolor sit amet, consectetur adipiscing elit.
               </p>
               <div class = "buttonMembersAlign">
                   <a href = "members.html" class = "buttonMembers">Meet Our Members</a>
                </div>
           </div>
       </div>
       <div class = "imageContainerMembers">
           <img id = "ferret1" src="img/ferrets/ferret1.png">
       </div>
   </div>

<!---------------------- CONTAINER 2 COBBERTUNITY---------------------->
<div class = "container">
    <div class = "imageCobbertunity">
        <img id = "ferret2" src="img/ferrets/ferret2.png">
    </div>
    <div class = "contentCobbertunity">
        <div>
            <h1>Cobbertunity</h1>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            </p>
            <div>
                <div class = "buttonCobbertunityAlign">
                    <a href = "https://www.concordiacollege.edu/academics/programs-of-study/offutt-school-of-business/cobbertunity/" 
                    target="_blank" class = "buttonCobbertunity">Learn More</a>
                </div>
             </div>
        </div>
    </div>
</div>


<!---------------------- CONTAINER 3 PROGRAMS ---------------------->
<div class = "container">
    <div class = "contentPrograms">
        <div>
            <h1>Programs</h1>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            </p>
            <div class = "buttonProgramsAlign">
                <a href = "https://www.concordiacollege.edu/academics/programs-of-study/offutt-school-of-business/" 
                target="_blank" class = "buttonPrograms">Learn About Programs</a>
             </div>
        </div>
    </div>
    <div class = "imagePrograms">
        <img id = "ferret3" src="img/programsImage.png">
    </div>
</div>


<!---------------------- CONTAINER 4 CONNECT ---------------------->
    <div class = "container">
        <div class = "imageConnect">
            <img id = "ferret4" src="img/ferrets/ferret4.png">
        </div>
        <div class = "contentConnect">
            <div>
                <h1>Cobber Connect</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                </p>
                <div class = "buttonConnectAlign">
                    <a href = "https://cobberconnect.cord.edu/feeds?type=club&type_id=35499&tab=home/"
                    target="_blank" class = "buttonConnect">Learn More</a>
                </div>
            </div>
        </div>
    </div>



<!---------------------- CONTAINER 5 SOCIAL MEDIA ---------------------->
<div class = "container">
    <div class = "contentSocial">
        <div>
            <h1>Social Media</h1>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            </p>
            <div class = "buttonSocialAlign">
                <a href = "https://www.instagram.com/cobberentrepreneurs/"
                target="_blank" class = " bi bi-instagram buttonSocial">Entrepreneurship Club</a>
             </div>
        </div>

    </div>
    <div class = "imageSocial">
        <img id = "ferret5" src="img/ferrets/ferret5.png">
    </div>
</div>
</div>



   <!-- JavaScript -->


<script src="https://cdn.jsdelivr.net/gh/greentfrapp/pocoloco@minigl/minigl.js"></script>
<script>
var gradient = new Gradient();
gradient.initGradient("#canvas");
</script>


</body>
</html>