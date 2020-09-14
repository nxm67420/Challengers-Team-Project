<?php require_once("connection.php");?>


<!doctype html>
<html>
<head>
    <title>Register</title>
</head>
<style>
    <?php require_once("login_style.php");?>
</style>
<body>
<div class="login-wrap" style="background: url('images/registration.jpg')">
    <div class="login-html">
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab" style="color:white; text-decoration:underline;text-decoration-color: blue;">Sign up</label>
        <div class="login-form">
            <form  class="sign-in-htm" method = "post">
                <div class="group">
                    <label for="user" class="label">Username</label>
                    <input type = "text" id="user_name" onkeyup="check_user()" name="user_name" class="input" required/>
                </div>
                <div class = "group">
                    <div id="checking">Checking</div>
                </div>
                <div class="group">
                    <label for="pass" class="label">Password</label>
                    <input type = "password" name="password" class="input" required/>
                </div>
                <div class="group">
                    <input type="submit" class="button" id="register" name="register" value= "register" />
                </div>
                <div class="hr"></div>
                <div class="register">
                    <a href = "login.php">Login here</a>
                </div>
            </form>
        </div>
    </div>
</div>
            <?php if(isset($_POST['register'])){

                    $user_name = $_POST['user_name'];
                    $password = $_POST['password'];

                    $q="INSERT INTO `users` (`id`, `user_name`, `password`)
                        VALUES('','".$user_name."','".$password ."')";
                    $r=mysqli_query($con, $q);

                    if($r){
                        header("location:login.php");
                    }else{
                        echo $q;
                    }

                }


                ?>
                <script src="sub_file/jquery-3.4.1.js"></script>
                <script>
                    document.getElementById("register").disable = true;
                 function check_user(){

                    var user_name = document.getElementById("user_name").value;

                    $.post("sub_file/user_check.php",
                    {
                        user: user_name
                    },

                    function(data, status){
                        if(data=='<p style ="color:red">User already registered</p>'){
                            document.getElementById("register").disable = true;
                        } else{
                            document.getElementById("register").disable = false;
                        }

                        document.getElementById("checking").innerHTML= data;
                    }

                    );

                 }

                </script>



</body>
</html>

