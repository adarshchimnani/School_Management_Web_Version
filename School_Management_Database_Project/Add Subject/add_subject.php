<?php

if (isset($_POST['Std_id'])) {
    $s_id = $_POST['Std_id'];
}


if (isset($_POST['t_id'])) {
    $t_id = $_POST['t_id'];
}


if (isset($_POST['marks'])) {
    $marks = $_POST['marks'];
}


if (isset($_POST['class'])) {
    $c_id = $_POST['class'];
}


if (isset($_POST['year'])) {
    $year = $_POST['year'];
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
		$sql =  "call sub_insert('$s_id', '$t_id', '$marks', '$c_id', '$year')";
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



 