<?php

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
		$sql =  "CALL sub_r ('$term')";
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
					<table align="center" border="5px" style="width:1300px; line-height:40px; margin-top:80px;"> 
						
						<th colspan="15"><h2>Subjects</h2></th> </tr>
						
						</tr> 
							<th> Subject</th> 
							<th> Total Marks </th>  
							<th> Teacher Name</th>
							<th> Class </th> 
							<th> Term Year </th>
				
						</tr> 
				
				<?php				
				while($rows=mysqli_fetch_assoc($result))
				{ 
				?> 
				
				 <tr> 
					<td align="center"><?php echo $rows['subject']; ?></td> 
					<td align="center"><?php echo $rows['total_marks']; ?></td> 
					<td align="center"><?php echo $rows['name']; ?></td> 
					<td align="center"><?php echo $rows['class_id']; ?></td> 
					<td align="center"><?php echo $rows['term_year']; ?></td> 
					
				 </tr>
			
				<?php 
               }
				?> 

				</table> 
				
				
				</body> 
				</html>	

