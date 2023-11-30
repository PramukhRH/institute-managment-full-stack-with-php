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
    $course_name = test_input($_POST["course_name"]);
    $course_descr = test_input($_POST["course_descr"]);
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
    $sql = "INSERT INTO course (name, description)
    VALUES ('$course_name', '$course_descr')";
    $result = $conn->query($sql);
    if ($result === TRUE) {
        header("Location: http://localhost:8002/institute-managment/add_course.php?success_code=202");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
