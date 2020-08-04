<?php

if (isset($_POST['from'])) {
    $from = $_POST['from'];
}

if (isset($_POST['to'])) {
    $to = $_POST['to'];
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
		$sql =  "CALL promote_student ('$from', '$to')";
		$result=mysqli_query($conn, $sql);
		
		
	
		if(!$result)
		{	
			echo $result->error;
			echo ' Result not available';
		}	
		
		else
		{
			header("Location: http://localhost/School_Management_Database_Project/Main Menu/main menu.html");
		}
		
	}
?>



