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
</head>
<title>Dashboard</title>
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
    </nav>
	</a>
</nav>
	<div class="container">
		<div class="row">
			<div class="col-lg">
			</div>
			<div class="col-lg">
				<div class="jumbotron" style="margin-top:100px;border:1px solid black;border-radius: 13px;background-color:skyblue; color:black ;width:800px;">
					<h4 class="display-4" style="padding-left:20px;">Welcome<br></h4>
					<p class="lead" style="padding-left:20px; ">Implementing an effective student management system contributes to the overall efficiency of educational institutions, enhances the learning experience, and supports the success of students throughout their academic journey.
                 Many educational institutions use specialized software or platforms to streamline these processes and provide a better experience for students and administrators alike.</p>
				</div>
			</div>
			<div class="col-lg">
			</div>
		</div>
	</div>
</body>
<nav class="navbar fixed-bottom navbar-light  justify-content-center" style="height:6%;background-color:skyblue;">
	<div class="text-center p-3" style="color:black">
		© 2023 Copyright
		<a class="text-dark" href="#" style="text-decoration:none; ">crescdatasoft</a>
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
</html>
<?php
	} else {
		echo "0000";
	}
}
?>