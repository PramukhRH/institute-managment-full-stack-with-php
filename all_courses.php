<?php
session_start();
if (empty($_SESSION['user'])) {
	header("Location: http://localhost:8002/institute-managment/login.php");
} else {
	if ($_SESSION['user'] == "admin") {
?>
<html>
<head>
<title>all course</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
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
	<div class="container" id="page-container">
		<div class="row" id="content-wrap">
			<div class="col-xl">
			</div>
			<div class="col-xl">
				<div class="card" style="margin-top:100px;border-radius: 13px;background-color: skyblue;">
					<div class="card-body">
						<h4 style="text-align:center;color:#34495E;font-size:23px;" class="pt-1">All Courses</h4>
						<hr>
						<?php
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
						$sql = "SELECT * FROM course ORDER BY course_id";
						$result = $conn->query($sql);
						?>
						<table class="table table-striped mt-4">
							<thead>
								<tr>
									<th>Id</th>
									<th>Name</th>
									<th>Description</th>
									<th>Option</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$temp_id = 0;
								while ($data = mysqli_fetch_assoc($result)) {

									$temp_id++;
									?>
									<tr>
										<td><?php echo $temp_id; ?> </td>
										<td><?php echo $data['name']; ?> </td>
										<td><?php echo $data['description']; ?> </td>
										<td><a href="https://localhost:8002/institute-managment/delete_course.php?courseid=<?php echo $data['course_id']; ?>"><button type="button" class="btn" style="background-color:#CB4335;color:white;font-size: 13px;">Delete</button> </a></td>
									</tr>
								<?php
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-xl">
			</div>
		</div>
	</div>
</body>
<nav class="navbar fixed-bottom navbar-light justify-content-center" style="height:6%; background-color: skyblue ;">
	<div class="text-center p-3" style="">
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
</html>
<?php
	} else {
		echo "0000";
	}
}
?>