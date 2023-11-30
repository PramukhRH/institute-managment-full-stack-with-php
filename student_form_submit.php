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
    $sql = "INSERT INTO student (name, address, mobile, email)
    VALUES ('$student_name', '$student_address', '$student_number', '$student_email')";
    $result = $conn->query($sql);
    if ($result === TRUE) {
        header("Location: http://localhost:8002/institute-managment/add_student.php?success_code=202");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
