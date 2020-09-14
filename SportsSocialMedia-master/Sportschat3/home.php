<?php
session_start();
include 'connection.php';
if(isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
    $get_user = $con->query("SELECT * FROM users WHERE user_name = '$user'");
    $user_data = $get_user->fetch_assoc();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        * {
            box-sizing: border-box;
            font-family: Candara;
        }
        html, body {
            height: 100%;
            margin: 0;
            font: 1em "Fira Sans", sans-serif;
            background-color: #303030;
        }
        .mySlides {
            display: none
        }

        img {
            vertical-align: middle;
        }

        /* Slideshow container */
        .slideshow-container {
            max-width: 1000px;
            position: relative;
            margin: auto;
            padding-top: 20px;
        }

        /* Caption text */
        .text {
            color: #f2f2f2;
            font-size: 20px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
            padding-left: 250px;
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 9px;
            padding-left: 400px;
            padding-top: 20px;
            position: absolute;
            top: 0;
        }

        /* The dots/bullets/indicators */
        .dot {
            cursor: pointer;
            height: 15px;
            width: 15px;
            margin: 0%;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active, .dot:hover {
            background-color: #717171;
        }

        /* Fading animation */
        .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 1.5s;
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @-webkit-keyframes fade {
            from {opacity: .4}
            to {opacity: 1}
        }

        @keyframes fade {
            from {opacity: .4}
            to {opacity: 1}
        }

        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
            .prev, .next,.text {font-size: 11px}
        }
        .center{
            width: 50%;
            height: 70%;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        .topbar {
            background-color: black;
        }
        .topbar img{
            width:30%;
            height: 250px;
            display: block;
            margin-left: auto;
            margin-right: 40%;
        }
        .topnav {
            position: relative;
            overflow: hidden;
            background-color: black;
        }

        .topnav a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        .topnav-center a {
            float: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .topnav-right {
            float: right;
        }
    </style>
<script type="text/javascript">
var image1=new Image();
image1.src="images/img4.jpeg";
var image2=new Image();
image2.src="images/login.jpg";
var image3=new Image();
image3.src="images/registration.jpg";
var image4=new Image();
image4.src="images/navbar.jpg";
var image5=new Image();
image5.src="images/img5.jpg";


</script>
</head>

<body>
<link href="Stylesheet.css" rel="stylesheet" type="text/css">
<div>
    
		<div style="color:white;">
  
	   
<img src="images/navbar.jpg" name="slide" width="100%" height="400px">
</div>
		<script type="text/javascript">
            var step=1;

           function slideit(){
	       document.images.slide.src=eval("image"+step+".src")
	      if(step<5)
		  step++
	     else
		step=1;
	setTimeout("slideit()", 2500)
}
slideit()
</script>
    <div class="topnav">
        <a href="home.php">Home</a>
        <a href="search_user.php">Search User</a>
        <div class="topnav-center">
            <a class ="chat" href="php-chat/index.php">Join Sports Chat Now</a>
        </div>
        <div class="topnav-right">
            <a href="profile.php">Profile</a>
            <a href="logout.php">Log out</a>
        </div>
		
    </div>
		    <center><div style="background-color: rgba(255,255,255,0.7); top:0;width:70%">
	      <h1>Welcome To Home Page </h1></center>
		<div style="color:white;">

	

    <div style="margin-left:15%; margin-right:15%; background-color:#eff0f0; height: 100%;">
        <main>
            <div class="background"></div>
        </main>
            <div class="profile" style="padding-left: 100px; padding-top: 50px">
                <img class="profilePic" src="images/profile.png" alt="Avatar">
                <p style="text-align:center; background-color:black; color:white; height:30px; "><?php echo $_SESSION['username']; ?></p>
            </div>
		

            <div class="slideshow-container">

                <div class="mySlides fade">
                    <div class="numbertext">1 / 3</div>
                    <a href="http://www.nfl.com/news" target="_blank"><img class="center" src="images/aaf3.jpg"></a>
                        <div class="text">NFL News</div>
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">2 / 3</div>
                    <a href="http://www.nfl.com/schedules" target="_blank"><img class="center" src="images/nfl.jpg"></a>
                    <div class="text">Upcoming Games</div>
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">3 / 3</div>
                    <a href="https://www.nfl.com/teams" target="_blank"><img class="center" src="images/playerr.jpg"></a>
                        <div class="text">Teams and Players</div>
                </div>
            </div>
        <br>

        <div style="padding-left: 850px">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>
        <br>

        <div class="twitter" style="margin-left: 10%">
            <a class="twitter-timeline"  data-width="800" data-height="500" data-theme="dark" data-link-color="#2B7BB9" href="https://twitter.com/NFL?ref_src=twsrc%5Etfw">Tweets by NFL</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
    </div>
</div>

</body>

<script>
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {myIndex = 1}
        x[myIndex-1].style.display = "block";
        setTimeout(carousel, 4000);
    }
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
    }
</script>
</html>
