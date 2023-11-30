<?php
$validate_teacherEmail = $_POST['teacher_email'];
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$validate_teacherEmail = test_input($validate_teacherEmail);
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
$sql = "SELECT * FROM teacher WHERE email = '$validate_teacherEmail'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo 333;
} else {
    echo 444;
}
