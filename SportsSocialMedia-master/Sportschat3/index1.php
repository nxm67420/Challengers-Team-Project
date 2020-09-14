<?php
session_start();
if(isset($_SESSION['username'])){
//echo 'how are you '.$_SESSION['username'];
?>
<!doctype html>
<html>
<style>
body {
  background-image: url('images/img4.jpeg');
    background-size: 1500px;
	background-position: fixed;
	background-repeat: no-repeat;
}
html, body{
	height:100%;
	overflow:hidden;
	padding:0px;
	margin:0px;}
a, p{
	font-size:12px; 
	font-family:helvetica;
	}
#container{
	box-shadow:15px 15px 15px #000000;
	width:1000px;
	height:85%;
    margin:2% auto; 
	border-radius:1%; 
	overflow:hidden;
	}
#menu{
	background:black; 
	color:white; 
	padding:1%; 
	font-size:30px;
}
#left-col, #right-col{
	position:relative;
	float:left; 
	height:90%;
}
#left-col{
	width:29%
	}
#right-col{
	width:69%;
	border:4px solid #333;}
#left-col-container, #right-col-container{
	width:90%; 
	height:95%;
    margin:0px auto; 
	overflow:auto;
	}
.grey-back{
	border:1px solid black; 
	padding:5px; 
	background: #efefef;
	margin:0px auto;
	margin-top:2px;
	overflow: auto;
}
.image{
	float:left; 
	margin-right:5px; 
	width:50px; 
	height:50px;
}
#messages-container{
	height:90%;
	overflow:auto;
}
.textarea{
	width:90%;
	height:10%;
	position:absolute;
	bottom:1%;
	margin:0px auto;
}
.grey-message, .white-message{
	border: 3px solid black;
	width: 96%;
	padding: 5px;
	margin: 0px auto;
	margin-top:2px;
	overflow:auto;
}
.grey-message{
	background:#efefef;
}
#new-message{
	display:none;
	box-shadow:2px 10px 30px #000000; 
	width:500px;
	position: fixed; top:20%;
	background:white;
	z-index:2;
	left:33%;
	trasform: translate(-50%, 0);
	border-radius:10px;
    opacity:0.9;
	overflow: auto;
}
.m-header, .m-footer{
	background:#333; margin:5px;
	color:white; padding:5px; 
}
.m-header{
	font-size:20px; text-align:center;
}
.m-body{
	padding:5px;
}
.message-input{
	width:90%;
}
.topbar {
            background-color: black;
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

<body>
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
    <?php require_once("sub_file/new-message.php"); ?>
	<div id="container">
        <div id="menu">
		<?php 
		  
		  echo $_SESSION['username']; 
		
	    ?>
		</div>
		<div id = "left-col">
		<?php require_once("sub_file/left-col.php");?>
		</div>
		<div id = "right-col">
		  <?php require_once("sub_file/right-col.php");?>
		
		</div>
		
	</div>
	

</body>
</html>

<?php
}else{
	header("location:login.php");
}
?>