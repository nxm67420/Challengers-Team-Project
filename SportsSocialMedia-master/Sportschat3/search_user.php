<?php
session_start();
include 'connection.php';
if(isset($_SESSION['username'])) {
    $user =  $_SESSION['username'];
    ?>

    <!doctype html>
    <html>
    <head>
        <title>Profile</title>
    </head>
    <style>
        <?php require_once("profile_style.php");?>
		body{
			background-color:black;
		}
        #search{
            margin:20px;
			background-color:#333;
			
        }
        button{
            font:  bold 16px/1 sans-serif;
            border-radius: 10px;
            padding: 10px 12px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
        }
        input[type=text] {
            font:  18px/1 sans-serif;
            padding:5px 5px;
            border-radius: 10px;
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
    <body>
	<div style="background-color:black;">
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
        <div class="topnav-center">
            <?php
            echo '<a class ="chat" href="php-chat/index.php">Join Sports Chat Now</a>';
            ?>
        </div>
        <div class="topnav-right">
            <?php
            echo '<a href="profile.php">Profile</a>';
            ?>
            <?php
            echo '<a href="logout.php">Log out</a>';
            ?>
        </div>
    </div>
    <center><div id = "search" style="color: black; background:rgba(255,255,255,.5); width: 50%; height:160px;">
        <h1 style="background-color:blue; width:50%; opacity:0.7; color:black">Search User</h1>
        <form method="POST" action="display_profile.php">
            <input type="text" class="form-control" name="user" placeholder="Search" required="required"/>
            <button class="btn btn-success" name="search" >Search</button>
        </form>
    </div></center>
	</div>
    </body>
    </html>

    <?php

}else{
    header("location:login.php");
}

?>
