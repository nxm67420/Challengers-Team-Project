<?php
session_start();
include 'connection.php';
if (isset($_POST['remove_team'])) {
    $user = $_SESSION['username'];
    $team = $_POST['team'];
    $remove_team = $con->query("DELETE FROM favorite_team WHERE team='$team' AND user_name = '$user'");

    if ($remove_team) {
        header("Location: profile.php");
    } else {
        echo $con->error;
    }
}
?>