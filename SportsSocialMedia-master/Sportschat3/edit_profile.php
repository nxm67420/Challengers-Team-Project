<?php
session_start();
include 'connection.php';
if(isset($_SESSION['username'])) {
    $user =  $_SESSION['username'];
    $get_user = $con->query("SELECT * FROM users WHERE user_name = '$user'");
    $user_data = $get_user->fetch_assoc();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $_SESSION['username'] ?>'s Profile Settings</title>
    <style>
        <?php require_once("edit_profile_style.php");?>
		
    </style>
</head>
<body>
<div class="topnav">
    <a href="home.php">Home</a>
    <?php
    echo '<a href="search_user.php">Search User</a>';
    ?>
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

<div class="center-content" style="background-color:black; color:white">
    <h3>Update <?php echo $user_data['user_name'] ?> 's Profile Information</h3>
   <!-- <form method="post" action="update-profile-action.php">
        <label>Username:</label>
            <input type="text" name="username" value="<?php echo $user_data['user_name'] ?>" required/><br>
        <label>Password:</label>
            <input type="password" name="password" value="<?php echo $user_data['password'] ?>" required/><br>
        <input type="submit" name="update_profile" value="Update Profile" />
    </form>
    -->

    <button onclick="myFunction()">Add Team</button>
    <button onclick="myFunction2()">Remove Team</button>
    <button onclick="myFunction3()">Add Player</button>
    <button onclick="myFunction4()">Remove Player</button>

    <div id="myDIV" style ="display:none">
    <h3>Add Favorite Team(s) Information</h3>
    <form method="post" action="add-team.php">
        <label>Favorite Team </label>
        <input type="text" name="team" required/><br>
        <input type="submit" name="add_team" value="Add" />
    </form>
    </div>


    <div id="myDIV2" style ="display:none">
        <h3>Remove Favorite Team(s) Information</h3>
        <form method="post" action="remove-team.php">
            <label>Team Name</label>
            <input type="text" name="team" required/><br>
            <input type="submit" name="remove_team" value="Remove" />
        </form>
    </div>


    <div id="myDIV3" style ="display:none">
        <h3>Add Favorite Player(s) Information</h3>
        <form method="post" action="add-player.php">
            <label>Favorite Player </label>
            <input type="text" name="player" required/><br>
            <input type="submit" name="add_player" value="Add" />
        </form>
    </div>


    <div id="myDIV4" style ="display:none">
        <h3>Remove Favorite Player(s) Information</h3>
        <form method="post" action="remove-player.php">
            <label>Player Name</label>
            <input type="text" name="player" required/><br>
            <input type="submit" name="remove_player" value="Remove" />
        </form>
    </div>
</div>
</body>
</html>

    <script>
        function myFunction() {
            var x = document.getElementById("myDIV");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "block";
            }
        }
        function myFunction2() {
            var y = document.getElementById("myDIV2");
            if (y.style.display === "none") {
                y.style.display = "block";
            } else {
                y.style.display = "block";
            }
        }
        function myFunction3() {
            var w = document.getElementById("myDIV3");
            if (w.style.display === "none") {
                w.style.display = "block";
            } else {
                w.style.display = "block";
            }
        }
        function myFunction4() {
            var z = document.getElementById("myDIV4");
            if (z.style.display === "none") {
                z.style.display = "block";
            } else {
                z.style.display = "block";
            }
        }
    </script>
<?php

}else{
    header("location:login.php");
}

?>

