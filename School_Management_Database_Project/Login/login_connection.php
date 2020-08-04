<?php
	
	// Database connection
	$conn = new mysqli('localhost','root','','school_managment_system');
	if($conn->connect_error)
	{
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} 
	
	else
	{
		if(isset($_POST['user_name']))
		{
			$user_name = $_POST['user_name'];
			$password = $_POST['password'];
	
			$sql = " select * from login where username='".$user_name."' AND password='".$password."' ";
			
			$result=mysqli_query($conn,$sql);
			
		
			if(mysqli_num_rows($result)==1)
			{
				header("Location: http://localhost/School_Management_Database_Project/Main Menu/main menu.html");
				exit();
			}
			
			else
			{
				echo '<script>alert("Your credentials are incorrect.")</script>'; 
				exit();
			}
		}
	}
?>

'