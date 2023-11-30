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
    $start_date = test_input($_POST["start_date"]);
    $end_date = test_input($_POST["end_date"]);
    $reason_to_leave = test_input($_POST["reason_to_leave"]);

    header("Location: http://localhost:8002/institute-managment/all_students.php?student_id=$student_id");
    exit();
}
?>

<!DOCTYPE html>
<html >
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>Leave Request</title>
</head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light " style="height:8%; background-color: skyblue;">
            <a class="navbar-brand mx-3" href="http://localhost:8002/institute-managment/dashboard.php">Student Managment System</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="http://localhost:8002/institute-managment/add_student.php">Add Student</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost:8002/institute-managment/all_students.php">All Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost:8002/institute-managment/add_teacher.php">Add Teacher</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost:8002/institute-managment/all_teachers.php">All Teachers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost:8002/institute-managment/add_course.php">Add Course</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost:8002/institute-managment/all_courses.php">All Courses</a>
                    </li>

                </ul>
            </div>
            <a class="mx-4 btn btn-light" href="http://localhost:8002/institute-managment/logout.php" style="float:right;text-decoration:none;">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
        </nav>
        <table class="table table-bordered mt-3">
        <div class="container pb-5 mb-5">
		<div class="row">
			<div class="col-xl">
			</div>
            <div class="col-xl">
            <div class="card"  style="margin-top:100px;border-radius:13px;background-color: skyblue;">
        <h1>Leave Request Form</h1>
       <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
     <input type="hidden" name="student_id" value="<?php echo $_GET['student_id']; ?>">
     <div class="card-body">              
    <div class="mx-2">
        <label for="start_date"style="color:black;font-size:13px;" class="mx-2">Start Date</label>
        <input type="date" class="form-control" id="start_date" name="start_date" style="width:auto;" required>
    </div>

    <div class="mx-2">
        <label for="end_date" style="color:black;font-size:13px;" class="mx-2">End Date</label>
        <input type="date" class="form-control" id="end_date" name="end_date" style="width:auto;" required>
    </div>
    
    <div class="mx-2">
        <label for="leave_reason" style="color:black;font-size:13px;" class="mx-2"  >Leave Reason</label>
        <select class="form-select" id="leave_reason" name="leave_reason"   style="width:auto;" required>
            <option value= "ch">choose the option</option>>
            <option value="sick">I'm sick</option>
            <option value="bad_climate">Bad climate</option>
            <option value="injured">I'm injured</option>
        </select>
    </div>
</div>
    <button type="button" class="btn btn-primary" onclick="showAlertAndRedirect()" style="width:55%;background-color:blue;color:white;">Approval</button>
</form>

<script>
    function showAlertAndRedirect() {

        if (validateForm()) {
            alert("Leave request submitted successfully!");
            window.location.href = "http://localhost:8002/institute-managment/all_teachers.php";
        }
    }

    function validateForm() {
  
        var startDate = document.getElementById('start_date').value;
        var endDate = document.getElementById('end_date').value;
        var leave_reason = document.getElementById('leave_reason').value;

        if (startDate === '' || endDate === '' || leave_reason === "ch" ) {
            alert("Please fill in all the details.");
            return false;
        }

        return true;
    }
</script>

<style>
        .navbar-light .nav-item .nav-link:hover {
            color: white; 
            background-color: darkblue; }
		.nav-link:hover {
  			color: white;
			background-color: darkblue;}										
		.navbar-brand:hover {
			color: white; 
			background-color: darkblue;
			}
    </style>
    </body>
</html>
