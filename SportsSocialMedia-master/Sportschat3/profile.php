<?php
session_start();
include 'connection.php';
if(isset($_SESSION['username'])) {
    $user =  $_SESSION['username'];
    $get_user = $con->query("SELECT team FROM favorite_team WHERE user_name = '$user'");
    $get_user2 = $con->query("SELECT player FROM favorite_player WHERE user_name = '$user'");
?>

<!doctype html>
<html>
    <head>
        <title>Profile</title>
    </head>
<style>
    <?php require_once("profile_style.php");?>
</style>
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
            echo '<a href="edit_profile.php">Edit Profile</a>';
            ?>
            <?php
            echo '<a href="logout.php">Log out</a>';
            ?>
        </div>
    </div>

    <div class="row">
        <div class="column" id="user_log">
            <div class="user_content">
                <div class="profile-logo">

                    <img src="images/profile.png" style="padding-top: 20px; width:20%">
					                    <center><h2 style="text-align: center; background-color:blue; opacity:0.7;width:60%; color:white">Welcome <?php echo $_SESSION['username']; ?></h2></center>
                </div>
            </div>
        </div>
        <div class="column" id="teams_players">
            <div class="team">
                <h3>Favorite Teams</h3>
                <p><?php
                    if ($get_user->num_rows > 0) {
                        // output data of each row
                        while($row = $get_user->fetch_assoc()) {
                            echo "<br>". $row["team"]. "<br>";
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>
                </p>
            </div>
            <div class="player">
                <h3>Favorite Players</h3>
                <p>
                    <?php
                    if ($get_user->num_rows > 0) {
                        // output data of each row
                        while($row = $get_user2->fetch_assoc()) {
                            echo "<br>". $row["player"]. "<br>";
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>
                </p>
            </div>
        </div>
    </div>
</body>
</html>

    <?php

}else{
    header("location:login.php");
}

?>