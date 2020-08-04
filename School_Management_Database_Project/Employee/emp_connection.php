<?php
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$gender = $_POST['gender'];
	$join_date = $_POST['join_date'];
	$designation = $_POST['designation'];
	$CNIC = $_POST['CNIC'];
	$salary = $_POST['salary'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
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
		$sql = "INSERT into employees(first_name, last_name, gender, joining_date, designation, cnic, salary, contact, email, address) values ('$first_name', '$last_name', '$gender', '$join_date', '$designation', '$CNIC', '$salary', '$phone', '$email', '$address')";
		mysqli_query($conn, $sql);
		$id = "SELECT id FROM employees ORDER BY id DESC LIMIT 1";
		$result = mysqli_query($conn, $id);
		$row = $result->fetch_assoc();
		$e_id = $row["id"];
		
		$e_sal = "INSERT INTO salary(employee_id,salary,month_year) VALUES('$e_id', '$salary','$join_date')";
	
	
		if(!mysqli_query($conn, $e_sal))
		{	
			echo $conn->error;
			echo ' Records not inserted';
		}	
			else
		{
			echo 'Record successfully inserted';
			header("Location: http://localhost/School_Management_Database_Project/Main Menu/main menu.html");
			exit();
		}
		
	}
?>


	