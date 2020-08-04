<?php

if (isset($_POST['s_id'])) {
    $s_id = $_POST['s_id'];
}

if (isset($_POST['class'])) {
    $class = $_POST['class'];
}

if (isset($_POST['session'])) {
    $session = $_POST['session'];
}

if (isset($_POST['term'])) {
    $term = $_POST['term'];
}	
	
	// Database connection
	$conn = new mysqli('localhost','root','','school_managment_system');
	if($conn->connect_error)
	{
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} 
	
	else
	{	
		$sql = "CALL session_result('$s_id', '$class', '$session', '$term')";
		$result=mysqli_query($conn, $sql);
		
		
		if(!$result)
		{	
			echo $result->error;
			echo ' Result not available';
		}	
		
	}
?>




			<!DOCTYPE html> 
				<html> 
				<head> 
					<style type="text/css">
	
				body{
					background: url('background.jpg');
					background-position:center;
					background-size: cover;
					font-family: arial;
					margin-top: 20px;
					}
					
				.custom-button,
				.custom-button:visited {
					margin-left:1400px;
					display: inline-block;
					background-color:#3BAF9F;
					padding:14px 110px;
					padding: 5px 10px;
					border: 2px solid #FFF;
					color:white;
					cursor:pointer;
					transition:0.25px;
					}

					.custom-button:hover {
					background-color:#5390F5;
						}	
						
						
					</style>
				</head> 
				<body> 
				<a class="custom-button" href="http://localhost/School_Management_Database_Project/Main Menu/main menu.html">Main Menu</a>
					<table align="center" border="1px" style="width:600px; line-height:40px; margin-top:100px;"> 
						<tr>
							<th>Student ID : <?php echo $s_id ?></th>
							<th>Class : <?php echo $class ?></th>
							<th>Session : <?php echo $session ?></th>
							<th>Term : <?php echo $term ?></th>
							
						</tr> 
							<th colspan="4"><h2>Result Card</h2></th> 
						</tr> 
							<th> Subjects</th> 
							<th> Total Marks </th> 
							<th> Obtained Marks </th> 
							<th> Grade </th> 
				
						</tr> 
				
				<?php				
				while($rows=mysqli_fetch_assoc($result)) 
				{ 
				?> 
				
				 <tr> 
					<td align="center"><?php echo $rows['subject_name']; ?></td> 
					<td align="center"><?php echo $rows['total_marks']; ?></td> 
					<td align="center"><?php echo $rows['obtained_marks']; ?></td> 
					<td align="center"><?php echo $rows['grade']; ?></td> 
				 </tr>
			
				<?php 
               }
				?> 

				</table> 
				
				
				</body> 
				</html>	

