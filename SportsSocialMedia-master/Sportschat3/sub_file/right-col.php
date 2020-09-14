<div id="right-col-container">
  <div id = "messages-container">

	 <?php
	       $no_message = false;
         if(isset($_GET['user'])){
			 $_GET['user'] = $_GET['user'];
			 
		 } else{
			 //user variable is not in the url bar
			 //so select the last user, you have sent message
			 $q='SELECT `sender_name`, `reciever_name` FROM `messages`
			 WHERE `sender_name` = "'.$_SESSION['username'].'"
			 OR `reciever_name` = "'.$_SESSION['username'].'"
			 ORDER BY `date_time` DESC LIMIT 1';
			 
			 $r = mysqli_query($con, $q);
			 if($r){
				 if(mysqli_num_rows($r) > 0){
					 while($row = mysqli_fetch_assoc($r)){
						 $sender_name = $row['sender_name'];
						 $reciever_name = $row['reciever_name'];
						 
						 if($_SESSION['username'] == $sender_name){
							 $_GET['user'] = $reciever_name;
						 } else{
							 $_GET['user'] = $sender_name;
						 }
					   }	 
				  }else{
					 //This user havent sent any message
					 echo  '<center><a style ="color:white; font-weight: bold; text-decoration: none;"> No messages from you </a></center>';
				       $no_message = true;
				 }
			 }else{
				 $q;
			 }
		 }
	     
		 if($no_message == false){
			 
	     $q='SELECT * FROM `messages` WHERE
		 `sender_name`="'.$_SESSION['username'].'"
		  AND `reciever_name` = "'.$_GET['user'].'"
		  OR
		  `sender_name` = "'.$_GET['user'].'"
		  AND `reciever_name`="'.$_SESSION['username'].'"';
		  
		  $r=mysqli_query($con, $q);
		  
		  if($r){
			  //query successfull
			  while($row = mysqli_fetch_assoc($r)){
				  $sender_name = $row['sender_name'];
				  $reciever_name = $row['reciever_name'];
				  $message = $row['message_text'];
				  
				  //chekc who is the sender of the message
				  if($sender_name == $_SESSION['username']){
					  //show the message with grey back
					 ?>
						<div class="grey-message">
						   <a href="#" style="text-decoration: none; font-weight: bold; color: #333;">Me</a>
						   <p> <?php echo $message; ?>  </p>
						</div>
                     <?php					 
				  }else{
					  //show the message with white back
					  ?>
						 <div class="white-message" style="color:white; font-weight: bold; font-size:20px;">
							<a href="#" style="text-decoration: none; font-weight: bold; color: white; font-size:15px;"><?php echo $sender_name; ?> </a>
							<p><?php echo $message; ?> </p>
						 </div>
					  
					  
					  
					  <?php
				  }
			  }
			  
		  }else{
			  echo $q;
		  }
		  
		  //end of no_messager
		 }
	 
	 ?>
	 
	 
  </div>
  <form method="post" id="message-form">
  <textarea class="textarea" id="message_text" placeholder="Write your message"></textarea>			  
  </form>
</div>
<script src="sub_file/jquery-3.4.1.js"></script>
<script>

    $("document").ready(function(event){
		//now it the form is subitted
		$("#right-col-container").on('submit', '#message-form', function(){
			//take the data fro textarea
			var message_text = $("#message_text").val();
			//send the data to the sending_process.php file
			$.post("sub_file/sending_process.php?user=<?php echo $_GET['user'];?>",
			{
				text: message_text,
			},
			//in return we will get
			function(data, status){
				
				//first remove the tect from
				//message_text so
				$("#message_text").val("");
				//now add the data inside
				//the message container
				document.getElementById("messages-container").innerHTML += data;
			}
			
			);
			
		});
		//if any button is click inside
		//right-col-container
		$("#right-col-container").keypress(function(e){
		//as we will submit the for with enter button
		  if(e.keyCode == 13 && !e.shiftKey){
			  //it means enter is clicked without shift key
			  //so submit the form
			  $("#message-form").submit();
		  }  
		
		});
		
		
	});
	function loadMsg(){
		
		var message_text = "";
			//send the data to the sending_process.php file
			$.post("sub_file/sending_process.php?user=<?php echo $_GET['user'];?>",
			{
				text: message_text,
			},
			//in return we will get
			function(data, status){
				
				//first remove the tect from
				//message_text so
				$("#message_text").val("");
				//now add the data inside
				//the message container
				document.getElementById("messages-container").innerHTML = data;
			}
			
			);
	}
window.setInterval(loadMsg, 2000);

</script>