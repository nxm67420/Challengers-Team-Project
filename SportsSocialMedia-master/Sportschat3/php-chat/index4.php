<?php
session_start();
include '../connection.php';
if(isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
    $get_user = $con->query("SELECT * FROM users WHERE user_name = '$user'");
    $user_data = $get_user->fetch_assoc();
}
?>
<html>
<head>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            font: 1em "Fira Sans", sans-serif;
            background-color: #303030;
        }
        .topnav {
            position: relative;
            overflow: hidden;
            background-color: black;
        }


        .topnav a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        .topnav-center a {
            float: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .topnav-right {
            float: right;
        }
        .container {
            text-align: center;
        }

        button {
            display: inline-block;
        }

        body{font-family:calibri;}
        .error {color:#FF0000;}
        .chat-connection-ack{color: #26af26;}
        .chat-message {border-bottom-left-radius: 4px;border-bottom-right-radius: 4px;
        }
        #btnSend {background: #26af26;border: #26af26 1px solid;	border-radius: 4px;color: #FFF;display: block;margin: 15px 0px;padding: 10px 50px;cursor: pointer;
        }
        #chat-box {background: #ffffff;border: 1px solid #eff0f0;border-radius: 4px;border-bottom-left-radius:0px;border-bottom-right-radius: 0px;min-height: 300px;padding: 10px; height: 40%; overflow-y: scroll;
        }
        .chat-box-html{color: #013369;margin: 10px 0px;font-size:0.8em;}
        .chat-box-message{color: #013369;padding: 5px 10px; background-color: #fff;border: 1px solid #eff0f0;border-radius:4px;display:inline-block;}
        .chat-input{border: 1px solid #eff0f0;border-top: 0px;width: 100%;box-sizing: border-box;padding: 10px 8px;color: #191919;
        }
		.space {
			box-shadow: inset 0px 1px 0px 0px #ffffff;
			background: linear-gradient(to bottom #ffffff 5% #f6f6f6 100%);
			background-color: #ffffff;
			border-radius:8px;
			border:3px solid #dcdcdc;
			display: inline-block;
			
			color:#666666;
			font-family:Arial;
			padding:8px 26px;
			
			
		}
		space:hover{
			background:liner-gradient(to bottom, #f6f6f6 5%, #ffffff 100%);
			background-color: #f6f6f6;
		}
		
    </style>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script>

        function showMessage(messageHTML) {
            $('#chat-box').append(messageHTML);
        }

        $(document).ready(function(){
            var websocket = new WebSocket("ws://localhost:8090/demo/php-socket.php");
            websocket.onopen = function(event) {
                showMessage("<div class='chat-connection-ack'>Connection is established!</div>");
            }
            websocket.onmessage = function(event) {
                var Data = JSON.parse(event.data);
                //He also added this if statement so that the message only sends if the room number the user is on is == 2
                if(Data.roomNumber ==4)
                {
                    showMessage("<div class='" + Data.message_type + "'>" + Data.message + "</div>");
                    $('#chat-message').val('');
                }
            };

            websocket.onerror = function(event){
                showMessage("<div class='error'>Problem due to some Error</div>");
            };
            websocket.onclose = function(event){
                showMessage("<div class='chat-connection-ack'>Connection Closed</div>");
            };

            $('#frmChat').on("submit",function(event){
                event.preventDefault();
                $('#chat-user').attr("type","hidden");
                var messageJSON = {
                    //He added roomNumber as a variable on here
                    roomNumber:4,
                    chat_user: $('#chat-user').val(),
                    chat_message: $('#chat-message').val()
                };
                websocket.send(JSON.stringify(messageJSON));
            });
        });
        //This is where I added the autoscroll js
        $(document).ready(function(){

            var autoScroll = true;

            $("#chat-box").eq(0).scroll(function() {
                if ($('#chat-box')[0].scrollTop < $("#chat-box")[0].scrollHeight - $('#chat-box').eq(0).height() - 50) autoScroll = false;
                else autoScroll = true;

                $("#autoScrollDiv").html((autoScroll ? "true" : "false"));
            });

            setInterval(function(){
                if (autoScroll) {
                    $("#chat-box").scrollTop($("#chat-box")[0].scrollHeight);
                }
            }, 100);
        });

    </script>
</head>
<body>
<div class="topnav">
    <a href="../home.php">Home</a>
    <?php
    echo '<a href="../search_user.php">Search User</a>';
    ?>
	<a class="private" href="../index1.php" style="width:900px; background-color: black;">Private Chat</a>
    <div class="topnav-right">
        <?php
        echo '<a href="../profile.php">Profile</a>';
        ?>
        <?php
        echo '<a href="../logout.php">Log out</a>';
        ?>
    </div>
</div>
<div style="margin-left:15%; margin-right:15%; background-color:#333; opacity: 0.9; height: 100%;">
    <center><h2 style="background-color:grey;  width:40%;">Welcome to Commerce Chat </h2></center>
    
    <div class="container" style="background-color: black;">
        <h3 style="text-align:center; color: white;">Available Chatrooms</h3>
		<div class="space">
        <button style="cursor: pointer;"onclick="window.location.href = 'http://localhost/SportsSocialMedia-master/Sportschat3/php-chat/index.php';">Public</button>
        <button style="cursor: pointer;" onclick="window.location.href = 'http://localhost/SportsSocialMedia-master/Sportschat3/php-chat/index2.php';">AFC North/East</button>
        <button style="cursor: pointer;" onclick="window.location.href = 'http://localhost/SportsSocialMedia-master/Sportschat3/php-chat/index6.php';">AFC South/West</button>
        <button style="cursor: pointer;"onclick="window.location.href = 'http://localhost/SportsSocialMedia-master/Sportschat3/php-chat/index4.php';">NFC North/East</button>
        <button style="cursor: pointer;" onclick="window.location.href = 'http://localhost/SportsSocialMedia-master/Sportschat3/php-chat/index5.php';">NFC South/West</button>
        </div>
    </div>


    <center><h1 style="text-align: center; background-color:white; opacity:0.5;width:70%;">NFC North/East</h1></center>
    


    <div style="padding-left: 20%; padding-right: 20%">
        <form name="frmChat" id="frmChat">
            <div id="chat-box"></div>
            <input type="text" name="chat-user" id="chat-user" placeholder="Name" value="<?php echo $user_data['user_name'] ?>" class="chat-input" disabled />
            <a><?php echo $user_data['user_name'] ?>:<input type="text" name="chat-message" id="chat-message" placeholder="Message"  class="chat-input chat-message" required /></a>
            <input type="submit" id="btnSend" name="send-chat-message" value="Send" >
        </form>
    </div>
</div>
</body>
</html>