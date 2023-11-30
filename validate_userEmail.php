<?php
$validate_userEmail = $_POST['user_email'];
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$validate_userEmail = test_input($validate_userEmail);
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
$sql = "SELECT * FROM student WHERE email = '$validate_userEmail'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo 333;
} else {
    echo 444;
}
