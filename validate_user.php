<?php
$userInputId = $_POST['userInputId'];
$userInputPassword = $_POST['userInputPassword'];
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$userInputId = test_input($userInputId);
$userInputPassword = test_input($userInputPassword);
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
$sql = "SELECT * FROM admin";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $rows = $result->fetch_assoc();
    $dbUserId = $rows['userid'];
    $dbUserPassword = $rows['password'];
    if ($dbUserId != $userInputId) {
        echo 333;
    } elseif (!password_verify($userInputPassword, $dbUserPassword)) {
        echo 444;
    } else {
        echo 555;
    }
}
