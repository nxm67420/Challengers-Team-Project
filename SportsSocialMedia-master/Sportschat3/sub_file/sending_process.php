<?php
session_start();
require_once("../connection.php");
if(isset($_SESSION['username']) and isset($_GET['user'])){
	if(isset($_POST['text'])){
		//npw check for empty message
		if($_POST['text'] != ''){
			//now from here we can insert
			//data into the database
			$sender_name = $_SESSION['username'];
			$reciever_name = $_GET['user'];
			$message = $_POST['text'];
			$data = date("Y-m-d h:i:sa");
			 $q = 'INSERT INTO `messages` 
	              (`id`,`sender_name`,`reciever_name`,`message_text`,`date_time`)
	               VALUES("","'.$sender_name.'","'.$reciever_name.'","'.$message.'","'.$date.'")';
	              $r = mysqli_query($con, $q);
				  if($r){
                     //message sent	
                      ?>
						<div class="grey-message">
						   <a href="#">Me</a>
						   <p style="font-size:15px;"> <?php echo $message; ?>  </p>
						</div>
                     <?php					 
				  }else{
					  //problem in query
					  echo $q;
				  }
			  
		}else{//empty message
			$q = 'select * from `messages` ';
	              //(`id`,`sender_name`,`reciever_name`,`message_text`,`date_time`)
	              // VALUES("","'.$sender_name.'","'.$reciever_name.'","'.$message.'","'.$date.'")';
	              $r = mysqli_query($con, $q);
				  if($r){
                     //message sent	
					 foreach ( $r as $record){
						 
                      ?>
						<div class="grey-message">
						   <a href="#"><?php echo $record['sender_name']; ?></a>
						   <p style="font-size:15px;"> <?php echo $record['message_text']; ?>  </p>
						</div>
                     <?php	
					 }					 
				  }
		}
			
	}else{
		
		echo 'problem with text';
	}
	
	
}else{
	
	echo 'Please login or select a user to send a message';
}



?>
<script>
function load(){
$.ajax({
        //send the message
        success: function() {
            //location.href = "admin.php";
            refresh();
        }
    });

}

load();
function refresh(){}

</script>