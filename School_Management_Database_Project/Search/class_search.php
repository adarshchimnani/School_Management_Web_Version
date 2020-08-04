<?php
if (isset($_POST['class_id'])) {
    $class_id = $_POST['class_id'];
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
		$sql =  "CALL class_details ('$class_id', '$term')";
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
					<table align="center" border="5px" style="width:1300px; line-height:40px; margin-top:125px;"> 
						
						<th colspan="15"><h2>Student Enrolled</h2></th> </tr>
						<th colspan="10"> Class : <?php echo $class_id ?></th> </tr>
						<th colspan="10"> Term Year : <?php echo $term ?></th>
						</tr> 
							<th> S.ID</th> 
							<th> Name </th>  
							<th> Gender</th>
							<th> D.O.B </th> 
				
						</tr> 
				
				<?php				
				while($rows=mysqli_fetch_assoc($result))
				{ 
				?> 
				
				 <tr> 
					<td align="center"><?php echo $rows['s_id']; ?></td> 
					<td align="center"><?php echo $rows['s_name']; ?></td> 
					<td align="center"><?php echo $rows['gender']; ?></td> 
					<td align="center"><?php echo $rows['birth_date']; ?></td> 
					
				 </tr>
			
				<?php 
               }
				?> 

				</table> 
				
				
				</body> 
				</html>	

