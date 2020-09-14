<div id="public-chat">
    <p class="m-header">New Message</p>
    <p class="m-body">
    <form align = "center" method="post">
        <input type = "text" list="user" onkeyup="check_in_db()"
               class= "message-input" placeholder = "user_name"
               name="user_name" id="user_name"/>
        <!-- this datalist will show available user -->
        <datalist id="user"></datalist>

        <br><br>
        <textarea class= "message-input" name= "message" placeholder = "write your message"></textarea><br><br>
        <input type = "submit" value = "send" id="send" name="send" />
        <button onclick="document.getElementById('public-chat').style.display='none'">Cancel</button>
    </form>
    </p>
    <p class="m-footer">Click send to send</p>

</div>
<?php
require_once("connection.php");

if(isset($_POST['send'])){
    $sender_name = $_SESSION['username'];
    $reciever_name = $_POST['user_name'];
    $message = $_POST['message'];
    $date = date("Y-m-d h:i:sa");

    $q = 'INSERT INTO `messages` 
	  (`id`,`sender_name`,`reciever_name`,`message_text`,`date_time`)
	  VALUES("","'.$sender_name.'","'.$reciever_name.'","'.$message.'","'.$date.'")';
    $r = mysqli_query($con, $q);
    if($r){
        //message sent
        header("location:index.php?user=".$reciever_name);

    }else{
        //query problem
        echo $q;
    }



}


?>
<script src="sub_file/jquery-3.4.1.js"></script>
<script>
    //it will disabled the send button with refresh page as well
    document.getElementById('send').disabled = true;

    function check_in_db(){
        var user_name = document.getElementById("user_name").value;
        //send this user_name to another file check_in_db.php
        $.post("sub_file/check_in_db.php",
            {
                user:user_name
            },
            //we will recieve this data from check_in_db.php file
            function(data, status){
                //alert(data)
                if(data=='<option value="no user">'){
                    //if user is registerd send button will work
                    document.getElementById('send').disabled = true;
                }else{
                    //send button will not work
                    document.getElementById('send').disabled = false;

                }
                document.getElementById('user').innerHTML = data;
            }

        );
    }
</script>