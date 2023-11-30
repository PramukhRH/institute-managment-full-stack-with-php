<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"]) && empty($_POST["password"])) {
        header("Location: http://localhost:8002/institute-managment/login.php?error_code=111");
    } elseif (empty($_POST["name"])) {
        header("Location: http://localhost:8002/institute-managment/login.php?error_code=222");
    } elseif (empty($_POST["password"])) {
        header("Location: http://localhost:8002/institute-managment/login.php?error_code=333");
    } else {
        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $name = test_input($_POST["name"]);
        $password_user = test_input($_POST["password"]);
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
            $userid = $rows['userid'];
            $hash = $rows['password'];
            if ($name != $userid) {
                header("Location: http://localhost:8002/institute-managment/login.php?error_code=444");
            } elseif (password_verify($password_user, $hash)) {
                $_SESSION["user"] = "admin";
                if (isset($_SESSION["user"])) {
                    header("Location: http://localhost:8002/institute-managment/dashboard.php");
                } else {
                    echo 22222;
                }
            } else {
                header("Location: http://localhost:8002/institute-managment/login.php?error_code=555");
            }
        } else {
            echo "0 results";
        }
        $conn->close();
    }
}
