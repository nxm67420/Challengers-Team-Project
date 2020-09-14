<?php 
session_start();
require_once("connection.php");
?>
<!doctype html>
<html>
<head>
    <title>Log In</title>
</head>
<style>
    <?php require_once("login_style.php");?>
</style>
<body>
<div class="login-wrap">
    <div class="login-html">
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab" style="color:white; text-decoration:underline;text-decoration-color: blue;">Sign In</label>
        <div class="login-form">
            <form class="sign-in-htm" method="post">
                <div class="group">
                    <label for="user" class="label">Username</label>
                    <input type = "text" class="input" name="user_name" />
                </div>
                <div class="group">
                    <label for="pass" class="label">Password</label>
                    <input type = "password" class="input" name="password" />
                </div>
                <div class="group">
                    <input type = "submit" class="button" value = "login" name = "login" />
                </div>
                <div class="hr"></div>
                <?php
                if(isset($_POST['login'])){
                    $user_name = $_POST['user_name'];
                    $password = $_POST['password'];

                    $q='SELECT * FROM `users` WHERE `user_name`="'.$user_name.'"AND `password`="'.$password.'"';

                    $r = mysqli_query($con, $q);
                    if($r){
                        if(mysqli_num_rows($r)>0){

                            $_SESSION['username'] = $user_name;
                            header("location:profile.php");
                        }else{

                            echo '<h4 align="center">Your password and user name do not matched.</h4>';
                        }
                    }else{
                        echo $q;
                    }

                }
                ?>
                <div class="register">
                    <a href="register.php"> Register here </a>
                </div>
            </form>
        </div>
    </div>
</div>




</body>
</html>