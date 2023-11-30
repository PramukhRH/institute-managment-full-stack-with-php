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
    $student_id = test_input($_POST["student_id"]);
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
    $sql = "SELECT * FROM student WHERE id = $student_id";
    $result = $conn->query($sql);
    $data = mysqli_fetch_assoc($result);
    $student_id = $data['id'];
    if (isset($_POST['course'])) {
        foreach ($_POST['course'] as $value) {
            $sql2 = "SELECT * FROM course WHERE course_id = $value";
            $result2 = $conn->query($sql2);
            $data2 = mysqli_fetch_assoc($result2);
            $course_id = $data2['course_id'];
            $course_name = $data2['name'];
            $sql3 = "SELECT * FROM student_courses WHERE student_id = $student_id AND course_id = $course_id";
            $result3 = $conn->query($sql3);
            if ($result3->num_rows > 0) {
                $sql5 = "DELETE FROM student_courses WHERE student_id = $student_id AND course_id<>$course_id";
                if ($conn->query($sql5) === TRUE) {
                    echo "deleted successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                $sql4 = "INSERT INTO student_courses (student_id, selected_course, course_id)
                                    VALUES ($student_id,'$course_name',$course_id)";
                $result4 = $conn->query($sql4);
            }
        }
    } else {
        $sql5 = "DELETE FROM student_courses WHERE student_id = $student_id";
        $result5 = $conn->query($sql5);
    }
    header("Location: http://localhost:8002/institute-managment/view_student.php?student_id=$student_id");
}
