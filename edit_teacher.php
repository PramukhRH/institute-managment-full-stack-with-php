<?php
session_start();
if (empty($_SESSION['user'])) {
	header("Location: http://localhost:8002/institute-managment/login.php");
} else {
	if ($_SESSION['user'] == "admin") {
		
		$explodeVal = explode("|",$_GET['teacher_id']);

		if (sizeof($explodeVal) == 1)
		{
			$teacher_id = $explodeVal[0];
		}
		else
		{
			$teacher_id = $explodeVal[0];
			$success_code = $explodeVal[1];
		}

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
		$sql2 = "SELECT * FROM course ORDER BY id";
		$result2 = $conn->query($sql2);
		$sql3 = "SELECT * FROM  teacher_courses WHERE teacher_id = $teacher_id";
		$result3 = $conn->query($sql3);
?>
<html>
<head>
<title>edit teacher</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
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
<body>
	<nav class="navbar navbar-expand-lg navbar-light " style="height:8%; background-color:skyblue;">
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
				<div class="card" style="margin-top:100px;border-radius: 13px;background-color:skyblue;">
					<h3 style="text-align:center;color:black;font-size:26px;" class="pt-3">Teacher Details</h3>
					<div class="text-center" id="err_alert" style="">
						<div class="alert  mt-3 py-4" role="alert" style="width:84%;margin-left:33px;background-color:#FEF9E7;color:#526170;">
							Please fill all the details
						</div>
						</div>
						<?php
						if (isset($success_code)) {
						?>
							<div class="text-center">
								<div class="alert  mt-3 py-4" role="alert" style="width:84%;margin-left:33px;background-color:black;color:white;" id="success_alert">
									teacher details updated successfully
								</div>
							</div>
						<?php
							$_GET['error_code'] = "";
							$error_code = "";
						} else {
						}
						?>
					<div class="card-body">
						<form action="editTeacher_form_submit.php" method="post" id="formid">
						<div class="row">
								<div class="col-xl-6 ">
									<div class="form-group">
								<label for="exampleInputPassword1" style="color:#34495E;font-size:13px;" class="mx-2">Teacher Name</label>
								<input type="text" class="form-control mt-2 mx-2" id="teacher_name" value="<?php echo $data['name']; ?>" name="teacher_name" autocomplete=off style="border-radius:7px;width:95%;font-size:16px;">
								<input type="number" value="<?php echo $data['id']; ?>" name="teacher_id" hidden>
							</div>
							<div class="form-group mt-3">
								<label for="exampleInputPassword1" style="color:#34495E;font-size:13px;" class="mx-2">Mobile Number</label>
								<input type="number" class="form-control mt-2 mx-2" id="teacher_number" value="<?php echo $data['mobile']; ?>" name="teacher_number" autocomplete=off style="border-radius:7px;width:95%;font-size:16px;">
							</div>
							<label for="exampleInputPassword1" style="margin-left:0px;margin-top:10px;color:#E74C3C;" id="error8" class="mx-3">mobile number must be 10 digits</label>
							</div>
							<div class="col-xl-6 ">
							<div class="form-group ">
								<label for="exampleInputPassword1" style="color:#34495E;font-size:13px;" class="mx-2">Email</label>
								<input type="email" class="form-control mt-2 mx-2" id="teacher_email" value="<?php echo $data['email']; ?>" name="teacher_email" autocomplete=off style="border-radius:7px;width:95%;font-size:16px;">
							</div>
							<label for="exampleInputPassword1" style="margin-left:0px;margin-top:10px;color:#E74C3C;" id="error5" class="mx-3">invalid email</label>

							<div class="form-group mt-3">
								<label for="exampleInputPassword1" style="color:#34495E;font-size:13px;" class="mx-2">Address</label>
								<input type="text" class="form-control mt-2 mx-2" id="teacher_address" value="<?php echo $data['address']; ?>" name="teacher_address" autocomplete=off style="border-radius:7px;width:95%;font-size:16px;">
							</div>
							</div>
							<div class="py-4">
								<button type="submit" class="btn  mt-4 btn-block mx-2" id="submitbtn"   style="width:95%;background-color:blue;color:white;">Submit</button>
							</div>
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
<nav class="navbar fixed-bottom navbar-light  justify-content-center" style="height:6%; background-color:skyblue">
	<div class="text-center p-3" style="background-color:skyblue;">
		© 2023 Copyright
		<a class="text-dark" href="#" style="text-decoration:none;">crescdatasoft</a>
	</div>
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
<script>
	$(document).ready(function() {
		$("#err_alert").hide();
		$("#error5").hide();
		$("#error8").hide();
		var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

		$("#submitbtn").click(function(e) {
			let teacher_name = $("#teacher_name").val();
			let teacher_number = $("#teacher_number").val();
			let teacher_email = $("#teacher_email").val();
			let teacher_address = $("#teacher_address").val();
			var allok = false;
			if (!allok) {
				e.preventDefault();
			}
			if ((teacher_name == null || teacher_name == "") && (teacher_number == null || teacher_number == "") && (teacher_email == null || teacher_email == "") && (teacher_address == null || teacher_address == "")) {
				$("#err_alert").show();
				$("#teacher_name").css("border", "1px solid #E74C3C");
				$("#teacher_number").css("border", "1px solid #E74C3C");
				$("#teacher_email").css("border", "1px solid #E74C3C");
				$("#teacher_address").css("border", "1px solid #E74C3C");
			} else if ((teacher_name == null || teacher_name == "") || (teacher_number == null || teacher_number == "") || (teacher_email == null || teacher_email == "") || (teacher_address == null || teacher_address == "")) {
				$("#err_alert").show();
				$("#teacher_name").css("border", "1px solid #E74C3C");
				$("#teacher_number").css("border", "1px solid #E74C3C");
				$("#teacher_email").css("border", "1px solid #E74C3C");
				$("#teacher_address").css("border", "1px solid #E74C3C");
			} else if (teacher_number.length < 10 || teacher_number.length > 10) {
				$("#teacher_number").css("border", "1px solid #E74C3C");
				$("#error8").show();
				$("#error5").hide();
				$("#err_alert").hide();
			} else if (!regex.test(teacher_email)) {
				$("#teacher_email").css("border", "1px solid #E74C3C");
				$("#error5").show();
				$("#error8").hide();
				$("#err_alert").hide();
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