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
	$teacher_name = test_input($_POST["teacher_name"]);
	$teacher_number = test_input($_POST["teacher_number"]);
	$teacher_email = test_input($_POST["teacher_email"]);
	$teacher_address = test_input($_POST["teacher_address"]);
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
	$id = rand(10, 100);
	$sql = "INSERT INTO teacher (name, mobile, email, address)
    VALUES ('$teacher_name',$teacher_number,'$teacher_email','$teacher_address')";
	$result = $conn->query($sql);
	if ($result === TRUE) {
		header("Location: http://localhost:8002/institute-managment/add_teacher.php?success_code=202");
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
}
