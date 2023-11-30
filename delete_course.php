<?php
session_start();
if (empty($_SESSION['user'])) {
	header("Location: http://localhost:8002/institute-managment/login.php");
} else {
	if ($_SESSION['user'] == "admin") {
		$courseid = $_GET['courseid'];
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
		$sql = "DELETE FROM course WHERE course_id = $courseid";
		$result = $conn->query($sql);
		$sql2 = "DELETE FROM student_courses WHERE course_id = $courseid";
		$result2 = $conn->query($sql2);
		$sql3 = "DELETE FROM teacher_courses WHERE course_id = $courseid";
		$result3 = $conn->query($sql3);
		if ($result === TRUE) {
			header("Location: http://localhost:8002/institute-managment/all_courses.php");
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	} else {
		echo "0000";
	}
}
