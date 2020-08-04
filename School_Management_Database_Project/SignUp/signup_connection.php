<?php
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$user_name = $_POST['user_name'];
	$password = $_POST['password'];
	$dob = $_POST['dob'];
	$address = $_POST['address'];

	// Database connection
	$conn = new mysqli('localhost','root','','school_managment_system');
	if($conn->connect_error)
	{
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} 
	
	else
	{
		$sql = "INSERT into login(first_name, last_name, username, password, birth_date, address) values('$first_name','$last_name','$user_name','$password','$dob','$address')";
		
		if(!mysqli_query($conn,$sql))
		{
			echo 'Record not inserted';
		}
		
		else
		{
			echo 'Record successfully inserted';
			header("Location: http://localhost/School_Management_Database_Project/Login/login.html");
			exit();
		}
		
	}
?>