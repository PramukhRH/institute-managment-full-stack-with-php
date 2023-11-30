<?php
$user_mobileNumber = $_POST['user_mobileNumber'];
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$user_mobileNumber = test_input($user_mobileNumber);
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
$sql = "SELECT * FROM student WHERE mobile = $user_mobileNumber";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo 333;
} else {
    echo 444;
}
?>