<?php
session_start();
if (empty($_SESSION['user'])) {
	header("Location: http://localhost:8002/institute-managment/login.php");
} else {
	if ($_SESSION['user'] == "admin") {
		$student_id = $_GET['student_id'];
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
		$sql = "DELETE FROM student WHERE id = $student_id";
		$result = $conn->query($sql);
		$sql2 = "DELETE FROM student_courses WHERE student_id = $student_id";
		$result2 = $conn->query($sql2);
		if ($result === TRUE) {
			header("Location: http://localhost:8002/institute-managment/all_students.php");
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	} else {
		echo "0000";
	}
}
