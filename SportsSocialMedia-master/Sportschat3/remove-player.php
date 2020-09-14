<?php
session_start();
include 'connection.php';
if (isset($_POST['remove_player'])) {
    $user = $_SESSION['username'];
    $player = $_POST['player'];
    $remove_player = $con->query("DELETE FROM favorite_player WHERE player='$player' AND user_name = '$user'");

    if ($remove_player) {
        header("Location: profile.php");
    } else {
        echo $con->error;
    }
}
?>