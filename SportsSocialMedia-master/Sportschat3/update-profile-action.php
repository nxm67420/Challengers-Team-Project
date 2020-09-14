<?php
session_start();
include 'connection.php';
if (isset($_POST['update_profile'])) {
    $user = $_SESSION['username'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $update_profile = $con->query("UPDATE users SET user_name = '$username', password = '$password' WHERE user_name = '$user'");

    if ($update_profile) {
        header("Location: profile.php");
    } else {
        echo $con->error;
    }
}
?>