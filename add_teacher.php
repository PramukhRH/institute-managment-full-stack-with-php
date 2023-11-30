<?php
session_start();
if (empty($_SESSION['user'])) {
	header("Location: http://localhost:8002/institute-managment/login.php");
} else {
	if ($_SESSION['user'] == "admin") {
?>
<html>
<head>
<title>add teacher</title>
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
	<div class="container pb-5 mb-5">
		<div class="row">
			<div class="col-xl">
			</div>
			<div class="col-xl">
				<div class="card" style=";margin-top:100px;border-radius: 13px;background-color:skyblue;width:800px;">
					<h3 style="text-align:center;color:black;font-size:26px;" class="pt-3">Add Teacher</h3>
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
							<div class="alert  mt-3 py-4" role="alert" style="width:84%;margin-left:33px;background-color:black;color:white;width:800px;" id="success_alert">
								Teacher details entered successfully
							</div>
						</div>
					<?php
						$_GET['error_code'] = "";
						$error_code = "";
					} else {
					}
					?>
					<div class="card-body">
						<form action="teacher_form_submit.php" method="post" name="myform" id="formid">
							<div class="row">
								<div class="col-xl-6 ">
									<div class="form-group">
										<label for="exampleInputPassword1" style="color:black;font-size:13px;" class="mx-2"> Name</label>
										<input type="text" class="form-control mt-2 mx-2" id="teacher_name" placeholder="name" name="teacher_name" autocomplete=off style="border-radius:7px;width:95%;font-size:16px;">
									</div>
									<div class="form-group mt-3">
										<label for="exampleInputPassword1" style="color:black;font-size:13px;" class="mx-2">Mobile Number</label>
										<input type="number" class="form-control mt-2 mx-2" id="teacher_number" placeholder="mobile number" name="teacher_number" autocomplete=off style="border-radius:7px;width:95%;font-size:16px;">
									</div>
									<label for="exampleInputPassword1" style="margin-left:0px;margin-top:10px;color:#E74C3C;" id="error7" class="mx-3">mobile number already exsists</label>
									<label for="exampleInputPassword1" style="margin-left:0px;margin-top:10px;color:#E74C3C;" id="error8" class="mx-3">mobile number must be 10 digits</label>
								</div>
								<div class="col-xl-6 ">
									<div class="form-group ">
										<label for="exampleInputPassword1" style="color:black;font-size:13px;" class="mx-2">Email</label>
										<input type="email" class="form-control mt-2 mx-2" id="teacher_email" placeholder="email" name="teacher_email" autocomplete=off style="border-radius:7px;width:95%;font-size:16px;">
									</div>
										<label for="exampleInputPassword1" style="margin-left:0px;margin-top:10px;color:#E74C3C;" id="error5" class="mx-3">invalid email</label>
										<label for="exampleInputPassword1" style="margin-left:0px;margin-top:10px;color:#E74C3C;" id="error6" class="mx-3">email already exsists</label>
									<div class="form-group mt-3">
										<label for="exampleInputPassword1" style="color:black;font-size:13px;" class="mx-2">Address</label>
										<input type="text" class="form-control mt-2 mx-2" id="teacher_address" placeholder="address" name="teacher_address" autocomplete=off style="border-radius:7px;width:95%;font-size:16px;">
									</div>
								</div>
									
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
<nav class="navbar fixed-bottom navbar-light justify-content-center" style="height:6%; background-color:skyblue;">
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
<script>
	$(document).ready(function() {
		$("#err_alert").hide();
		$("#error5").hide();
		$("#error6").hide();
		$("#error7").hide();
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
				// alert();
				$("#err_alert").show();
				$("#success_alert").hide();
				$("#teacher_name").css("border", "1px solid #E74C3C");
				$("#teacher_number").css("border", "1px solid #E74C3C");
				$("#teacher_email").css("border", "1px solid #E74C3C");
				$("#teacher_address").css("border", "1px solid #E74C3C");
			} else if ((teacher_name == null || teacher_name == "") || (teacher_number == null || teacher_number == "") || (teacher_email == null || teacher_email == "") || (teacher_address == null || teacher_address == "")) {
				// alert();
				$("#err_alert").show();
				$("#success_alert").hide();
				$("#teacher_name").css("border", "1px solid #E74C3C");
				$("#teacher_number").css("border", "1px solid #E74C3C");
				$("#teacher_email").css("border", "1px solid #E74C3C");
				$("#teacher_address").css("border", "1px solid #E74C3C");
			} else if (teacher_number.length < 10 || teacher_number.length > 10) {
				$("#teacher_number").css("border", "1px solid #E74C3C");
				$("#error8").show();
				$("#error5").hide();
				$("#error6").hide();
				$("#error7").hide();
				$("#err_alert").hide();
				$("#success_alert").hide();
			} else if (!regex.test(teacher_email)) {
				$("#teacher_email").css("border", "1px solid #E74C3C");
				$("#error5").show();
				$("#error6").hide();
				$("#error7").hide();
				$("#error8").hide();
				$("#err_alert").hide();
				$("#success_alert").hide();
			} else if ((teacher_email != null || teacher_email != "")) {
				var allok = false;
				if (!allok) {
					e.preventDefault();
				}
				let teacher_email = $("#teacher_email").val();
				$.ajax({
					url: 'http://localhost:8002/institute-managment/validate_teacherEmail.php',
					data: {
						teacher_email: teacher_email
					},
					type: 'post',
					success: function(data) {
						if (data == 333) {
							$("#user_email").css("border", "1px solid #E74C3C");
							$("#error6").show();
							$("#err_alert").hide();
							$("#error5").hide();
							$("#success_alert").hide();
						} else if (data == 444) {
							var allok = false;
							if (!allok) {
								e.preventDefault();
							}
							let teacher_number = $("#teacher_number").val();
							$.ajax({
								url: 'http://localhost:8002/institute-managment/validate_teachernumber.php',
								data: {
									teacher_number: teacher_number
								},
								type: 'post',
								success: function(data) {
									if (data == 333) {
										$("#user_email").css("border", "1px solid #E74C3C");
										$("#error7").show();
										$("#err_alert").hide();
										$("#error5").hide();
										$("#error6").hide();
										$("#success_alert").hide();
									} else if (data == 444) {
										$("#formid").submit();
									}
								}
							});
						}
					}
				});
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