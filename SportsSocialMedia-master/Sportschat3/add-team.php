<?php
session_start();
include 'connection.php';
if (isset($_POST['add_team'])) {
    $user = $_SESSION['username'];
    $team = $_POST['team'];
    $add_team = $con->query("INSERT INTO favorite_team (user_name,team) VALUES ('$user','$team')");

    if ($add_team) {
        header("Location: profile.php");
    } else {
        echo $con->error;
    }
}
?>