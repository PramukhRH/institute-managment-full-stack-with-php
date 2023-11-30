<?php
$teacher_mobileNumber = $_POST['teacher_number'];
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$teacher_mobileNumber = test_input($teacher_mobileNumber);
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
$sql = "SELECT * FROM teacher WHERE mobile = $teacher_mobileNumber";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo 333;
} else {
    echo 444;
}
