<?php
session_start();
if (empty($_SESSION['user'])) {
	header("Location: http://localhost:8002/institute-managment/login.php");
} else {
	if ($_SESSION['user'] == "admin") {
		$teacher_id = $_GET['teacher_id'];
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
		$sql = "DELETE FROM teacher WHERE id = $teacher_id";
		$result = $conn->query($sql);
		$sql2 = "DELETE FROM teacher_courses WHERE teacher_id = $teacher_id";
		$result2 = $conn->query($sql2);
		if ($result === TRUE) {
			header("Location: http://localhost:8002/institute-managment/all_teachers.php");
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	} else {
		echo "0000";
	}
}
