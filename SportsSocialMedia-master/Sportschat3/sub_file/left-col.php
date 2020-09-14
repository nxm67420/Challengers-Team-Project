<div id="left-col-container" style="background-color: #333; opacity:0.7">
	<div style ="cursor:pointer" onclick="document.getElementById('new-message').style.display='block'"  class ="white-back">
		<p style="text-align:center; color: white; background-color:#333; ">Search</p>			 
	</div>
    
<?php 
  $q = 'SELECT DISTINCT `reciever_name`, `sender_name`
    FROM `messages` WHERE
	`sender_name`= "'.$_SESSION['username'].'" OR
	`reciever_name`="'.$_SESSION['username'].'"
	ORDER BY `date_time` DESC';
	$r = mysqli_query($con, $q);
	if($r){
		if(mysqli_num_rows($r)>0){
			
			$counter = 0;
			$added_user = array();
			while($row=mysqli_fetch_assoc($r)){
				$sender_name=$row['sender_name'];
				$reciever_name=$row['reciever_name'];
				
				if($_SESSION['username']==$sender_name){
					//add the reciever_name but only once
					//so to do that check the user in array
					if(in_array($reciever_name, $added_user)){
					 	
						
					}else{
						?>
                        <!--the icon on the left column-->
						<div class ="grey-back">
		                  <img src="images/profile.png" class="image"/>
		                  <?php echo '<a style ="color:black; font-weight: bold; text-decoration: none;" href="?user='.$reciever_name.'">'.$reciever_name.'</a>' ; 
						  
						        echo '<br><a style ="color:black; font-weight: bold; text-decoration: none;"> Send a message </a>';
						  ?>	
                          						  
	                    </div>
						
						
						
						<?php
						
						//as reciever_name added so 
						//add it to the array as well
						$added_user = array($counter => $reciever_name);
						//increment the counter
						$counter++;
					}
					
				 }elseif($_SESSION['username']==$reciever_name){
					//add the sender_name but only once
					//so to do that check the user in array
					if(in_array($sender_name, $added_user)){
					 	
						
					}else{
						?> 
						<div class ="grey-back">
		                  <img src="images/profile.png" class="image"/>
		                  <?php echo '<a style ="color:black; font-weight: bold; text-decoration: none;"href ="?user='.$sender_name.'">'.$sender_name;'</a>';
                                  echo '<br><a style ="color:black; font-weight: bold; text-decoration: none;"> Send a message </a>';
						  ?>	
						  
	                    </div>
						
						
						
						<?php
						
						//as sender_name added so 
						//add it to the array as well
						$added_user = array($counter => $sender_name);
						//increment the counter
						$counter++;
					}
					
				}
			}
		}else{
			//no message sent
			echo '<center><a style ="color:white; font-weight: bold; text-decoration: none;"> No User </a></center>';
		}
	}else{
		//query problem
		echo $q;
	}
?>	

	
</div>