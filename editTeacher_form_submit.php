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
	$teacher_id = test_input($_POST["teacher_id"]);
	$teacher_name = test_input($_POST["teacher_name"]);
	$teacher_address = test_input($_POST["teacher_address"]);
	$teacher_email = test_input($_POST["teacher_email"]);
	$teacher_number = test_input($_POST["teacher_number"]);
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
	$sql = "SELECT * FROM teacher WHERE email = '$teacher_email'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0)
	{
		$sql2 = "SELECT * FROM teacher WHERE mobile = $teacher_number";
		$result2 = $conn->query($sql2);
		$data2 = mysqli_fetch_assoc($result2);
		if ($result2->num_rows > 0)
		{
			$sql3 = "UPDATE teacher SET name = '$teacher_name', address = '$teacher_address' WHERE id = $teacher_id";
			$result4 = $conn->query($sql3);
			if ($result4 === TRUE)
			{
				$success_code = 202;
				$value = $teacher_id."|".$success_code;
				
				header("Location: http://localhost:8002/institute-managment/edit_teacher.php?teacher_id=$value");
			}
			else
			{
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
		else
		{
			$sql5 = "UPDATE teacher SET name = '$teacher_name', mobile = $teacher_number, address = '$teacher_address' WHERE id = $teacher_id";
			$result5 = $conn->query($sql5);
			if ($result5 === TRUE)
			{
				$success_code = 202;
				$value = $teacher_id."|".$success_code;
				
				header("Location: http://localhost:8002/institute-managment/edit_teacher.php?teacher_id=$value");
			}
			else
			{
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
	}
	else
	{
		$sql6 = "SELECT * FROM teacher WHERE mobile = $teacher_number";
		$result6 = $conn->query($sql6);
		$data6 = mysqli_fetch_assoc($result6);
		if ($result6->num_rows > 0) 
		{ 
			$sql7 = "UPDATE teacher SET name = '$teacher_name', email = '$teacher_email', address = '$teacher_address' WHERE id = $teacher_id";
			$result7 = $conn->query($sql7);
			if ($result7 === TRUE)
			{
				$success_code = 202;
				$value = $teacher_id."|".$success_code;
				
				header("Location: http://localhost:8002/institute-managment/edit_teacher.php?teacher_id=$value");
			}
			else
			{
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
		else
		{
			$sql8 = "UPDATE teacher SET name = '$teacher_name', mobile = $teacher_number, email = '$teacher_email', address = '$teacher_address' WHERE id = $teacher_id";
			$result8 = $conn->query($sql8);
			if ($result8 === TRUE)
			{
				$success_code = 202;
				$value = $teacher_id."|".$success_code;

				header("Location: http://localhost:8002/institute-managment/edit_teacher.php?teacher_id=$value");
			}
			else
			{
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
	}
	
	$conn->close();

}

?>