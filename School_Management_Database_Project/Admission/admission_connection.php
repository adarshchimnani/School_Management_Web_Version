<?php
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$gender = $_POST['gender'];
	$dob = $_POST['dob'];
	$class = $_POST['class'];
	$term_year = $_POST['term_year'];
	$previous_school = $_POST['previous_school'];
	$father_name = $_POST['father_name'];
	$CNIC = $_POST['CNIC'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$s_id = "";
//	$p_id="";
	

	// Database connection
	$conn = new mysqli('localhost','root','','school_managment_system');
	if($conn->connect_error)
	{
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} 
	
	else
	{
		$sql_p = "INSERT into parent(name, cnic, contact, email, address) values ('$father_name', '$CNIC', '$phone', '$email', '$address')";
		mysqli_query($conn, $sql_p);
		$p_id = "SELECT p_id FROM parent ORDER BY p_id DESC LIMIT 1";
		$result = mysqli_query($conn, $p_id);
		$row = $result->fetch_assoc();
		$id = $row["p_id"];
		$sql_s = "INSERT into students(first_name, last_name, p_id, gender, birth_date, last_school, class_Addm) values('$first_name','$last_name', '$id', '$gender','$dob','$previous_school','$class')";
		mysqli_query($conn, $sql_s);
		
		$s_id = "SELECT s_id FROM students ORDER BY s_id DESC LIMIT 1";
		$get_id = mysqli_query($conn, $s_id);
		$id_fetch = $get_id->fetch_assoc();
		$id_st = $id_fetch["s_id"];
		$stu_class = "CALL s_class('$class','$id_st','$term_year')";
		mysqli_query($conn, $stu_class);
		
		$fee ="CALL fees_alct('$id_st','$class','$term_year')";
	
		
		if(!mysqli_query($conn, $fee))
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


	