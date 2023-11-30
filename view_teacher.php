<?php
session_start();
if (empty($_SESSION['user'])) {
	header("Location: http://localhost:8002/institute-managment/login.php");
} else {
	if ($_SESSION['user'] == "admin") {
		$teacher_id = $_GET['teacher_id'];
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
		$sql = "SELECT * FROM teacher WHERE id = $teacher_id";
		$result = $conn->query($sql);
		$data = mysqli_fetch_assoc($result);
		$sql2 = "SELECT * FROM course ORDER BY course_id";
		$result2 = $conn->query($sql2);
		$sql3 = "SELECT * FROM  teacher_courses WHERE teacher_id = $teacher_id";
		$result3 = $conn->query($sql3);
?>
<html>
<head>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
	<style>
		input::-webkit-outer-spin-button,
		input::-webkit-inner-spin-button {
			-webkit-appearance: none;
			margin: 0;
		}

		input[type=number] {
			-moz-appearance: textfield;
		}
	</style>
</head>
<title>viewT</title>
<body>
	<nav class="navbar navbar-expand-lg navbar-light " style="height:8%; background-color:skyblue">
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
	</nav>
	<div class="container pb-5 mb-5" style="    margin-left: revert;">
	<div class=" row">
		<div class="col-xl">
		</div>
		<div class="col-xl">
		<div class="card" style="margin-top:60px;border-radius: 13px;background-color:skyblue;width:630px; ">
				<h3 style="text-align:center;color:black;font-size:24px;" class="pt-3">Teacher Details</h3>
				<div class="card-body">
					<form action="courseSelectTeacher_form_submit.php" method="post">
						<div class="form-group">
							<label for="exampleInputPassword1" style="color:black;font-size:13px;" class="mx-2">Teacher Name</label>
							<input type="text" class="form-control mt-2 mx-2" id="exampleInputPassword1" placeholder="<?php echo ucfirst($data['name']); ?>" name="student_name" autocomplete=off style="border-radius:7px;width:95%;font-size:16px;" readonly>
							<input type="text" value="<?php echo $data['id']; ?>" name="teacher_id" hidden>
						</div>
						<div class="form-group mt-3">
							<label for="exampleInputPassword1" style="color:black;font-size:13px;" class="mx-2">Mobile Number</label>
							<input type="number" class="form-control mt-2 mx-2" id="exampleInputPassword1" placeholder="<?php echo $data['mobile']; ?>" name="student_number" autocomplete=off style="border-radius:7px;width:95%;font-size:16px;" readonly>
						</div>
						<div class="form-group mt-3">
							<label for="exampleInputPassword1" style="color:black;font-size:13px;" class="mx-2">Email</label>
							<input type="email" class="form-control mt-2 mx-2" id="exampleInputPassword1" placeholder="<?php echo $data['email']; ?>" name="student_email" autocomplete=off style="border-radius:7px;width:95%;font-size:16px;" readonly>
						</div>

						<div class="form-group mt-3">
							<label for="exampleInputPassword1" style="color:black;font-size:13px;" class="mx-2">Address</label>
							<input type="text" class="form-control mt-2 mx-2" id="exampleInputPassword1" placeholder="<?php echo ucfirst($data['address']); ?>" name="student_address" autocomplete=off style="border-radius:7px;width:95%;font-size:16px;" readonly>
						</div>
						<label for="exampleInputPassword1" class="mt-4" style="margin-left:50px;">Selected Courses</label>
						<div class="container">
							<div class="row">
								<div class="col-sm ">
									<?php
									while ($data2 = mysqli_fetch_assoc($result2)) {
										$course_id = $data2['course_id'];
										$sql4 = "SELECT * FROM teacher_courses WHERE teacher_id = $teacher_id AND course_id = $course_id";
										$result4 = $conn->query($sql4);
										if ($result4->num_rows > 0) {
										?>
											<div class="form-check mt-3">
												<input class="form-check-input" type="checkbox" value="<?php echo $data2['course_id']; ?>" name="course[]" id="flexCheckDefault" checked>
												<label class="form-check-label" for="flexCheckDefault">
													<?php echo $data2['name']; ?>
												</label>
											</div>
										<?php
										} else {
										?>
											<div class="form-check mt-3">
												<input class="form-check-input" type="checkbox" value="<?php echo $data2['course_id']; ?>" name="course[]" id="flexCheckDefault">
												<label class="form-check-label" for="flexCheckDefault">
													<?php echo $data2['name']; ?>
												</label>
											</div>
										<?php
										}	
									}
									?>
									<div class="py-1">
										<button type="submit" class="btn  mt-4 btn-block" style="width:95%;background-color:blue;color:white;">Submit</button>
									</div>
					</form>
				</div>
				
		</div>
	</div>
	</div>
	</div>
	<div class="col-xl">
	</div>
	</div>
	</div>
</body>
<nav class="navbar fixed-bottom navbar-light justify-content-center" style="height:6%; background-color:skyblue;">
	<div class="text-center p-3" style="">
		© 2023 Copyright
		<a class="text-dark" href="#" style="text-decoration:none;">crescdatasoft</a>
	</div>
	
</nav>
</html>
<?php
	} else {
		echo "0000";
	}
}
?>