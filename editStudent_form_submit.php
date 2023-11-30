<?php 
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	$student_id = test_input($_POST["student_id"]);
	$student_name = test_input($_POST["student_name"]);
	$student_address = test_input($_POST["student_address"]);
	$student_email = test_input($_POST["student_email"]);
	$student_number = test_input($_POST["student_number"]);
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "institute";
	$conn = new mysqli(
		$servername,
		$username,
		$password,
		$dbname
	);
	if ($conn->connect_error) {
		die("Connection failed: "
			. $conn->connect_error);
	}

	// echo $student_name;


	
	$sql = "UPDATE student SET name = '$student_name', address = '$student_address', mobile = $student_number, email = '$student_email' where id = $student_id";
	$result = $conn->query($sql);
	if ($result === TRUE) {
		$success_code = 202;
		$value = $student_id."|".$success_code;

		header("Location: http://localhost:8002/institute-managment/edit_student.php?student_id=$value" );
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
}
