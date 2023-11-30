<?php
session_start();
if (empty($_SESSION['user'])) {
	header("Location: http://localhost:8002/institute-managment/login.php");
} else {
	if ($_SESSION['user'] == "admin") {
?>
<html>
<head>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<title>add course</title>
<body>
	<nav class="navbar navbar-expand-lg navbar-light" style="height:8%; background-color: skyblue;">
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
	<div class="container">
		<div class="row">
			<div class="col-xl">
			</div>
			<div class="col-xl">
				<div class="card" style="margin-top:100px;border-radius:13px;background-color: skyblue;">
					<h3 style="text-align:center;color:#black;font-size:26px;" class="pt-3">Add Course</h3>
					<div class="text-center" id="err_alert" style="">
						<div class="alert  mt-3 py-4" role="alert" style="width:84%;margin-left:33px;background-color:black;color:white;">
							Please fill all the details
						</div>
					</div>
					<?php
					if (isset($_GET['success_code'])) {
						$success_code = $_GET['success_code'];
					} else {
					}
					if (isset($success_code)) {
					?>
						<div class="text-center">
							<div class="alert  mt-3 py-4" role="alert" style="width:84%;margin-left:33px;background-color:black;color:white;" id="success_alert">
								course details entered successfully
							</div>
						</div>
					<?php
						$_GET['error_code'] = "";
						$error_code = "";
					} else {
					}
					?>
				
					<div class="card-body">
						<form action="course_form_submit.php" method="post" name="myform" id="formid">
							<div class="form-group">
								<label for="exampleInputPassword1" style="color:black;font-size:13px;" class="mx-2">Course Name</label>
								<input type="text" class="form-control mt-2 mx-2" id="course_name" placeholder="name" name="course_name" autocomplete=off style="border-radius:7px;width:95%;font-size:16px;">
							</div>
							<div class="form-group mt-3">
								<label for="exampleInputPassword1" style="color:black;font-size:13px;" class="mx-2">Course Description</label>
								<input type="text" class="form-control mt-2 mx-2" id="course_descr" placeholder="description" name="course_descr" autocomplete=off style="border-radius:7px;width:95%;font-size:16px;">
							</div>
							<div class="py-4">
								<button type="submit" class="btn  mt-4 btn-block mx-2" id="submitbtn" style="width:95%;background-color:blue;color:white;">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-xl">
			</div>
		</div>
	</div>
</body>
<nav class="navbar fixed-bottom  justify-content-center" style="height:6%; background-color:skyblue">
	<div class="text-center p-3 " >
		© 2023 Copyright
		<a class="text-dark" href="#" style="text-decoration:none;">crescdatasoft</a>
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
	</div>
</nav>
<script>
	$(document).ready(function() {
		$("#err_alert").hide();

		$("#submitbtn").click(function(e) {
			let course_name = $("#course_name").val();
			let course_descr = $("#course_descr").val();
			var allok = false;
			if (!allok) {
				e.preventDefault();
			}
			if ((course_name == null || course_name == "") && (course_descr == null || course_descr == "")) {
				$("#err_alert").show();
				$("#success_alert").hide();
				$("#course_name").css("border", "1px solid #E74C3C");
				$("#course_descr").css("border", "1px solid #E74C3C");
			} else if ((course_name == null || course_name == "") || (course_descr == null || course_descr == "")) {
				$("#err_alert").show();
				$("#success_alert").hide();
				$("#course_name").css("border", "1px solid #E74C3C");
				$("#course_descr").css("border", "1px solid #E74C3C");
			} else {
				$("#formid").submit();
			}
		});
	});
</script>
</html>
<?php
	} else {
		echo "0000";
	}
}
?>