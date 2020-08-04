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
		$sql =  "CALL fees_allocate ('$term')";
		$result=mysqli_query($conn, $sql);
		
		
	
		if(!$result)
		{	
			echo $result->error;
			echo ' Result not available';
		}	
		
		else
		{
			echo 'Fees Updated';
			header("Location: http://localhost/School_Management_Database_Project/Main Menu/main menu.html");
			
		}
		
	}
?>




			
