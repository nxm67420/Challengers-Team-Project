<?php
session_start();
include 'connection.php';
if (isset($_POST['add_player'])) {
    $user = $_SESSION['username'];
    $player = $_POST['player'];
    $add_player = $con->query("INSERT INTO favorite_player (user_name,player) VALUES ('$user', '$player')");

    if ($add_player) {
        header("Location: profile.php");
    } else {
        echo $con->error;
    }
}
?>