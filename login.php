<html>
<head>
<title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<style>
		#page-container {
			position: relative;
			min-height: 86vh;
		}

		#content-wrap {
			padding-bottom: 2.5rem;
		}

		#footer {
			position: absolute;
			bottom: 0;
			width: 100%;
			height: 2.5rem;
		}

  	  body {
     			background-image: url('img1.jpg'); 
     		 	background-size: cover;
      			background-position: center; 
     			background-repeat: no-repeat;
    }

	</style>
</head>
<body>
	<nav class="bg" style="height:8%;">
		<a class="navbar-brand" href="#">
			<h2 style="text-align:center;color:black;background-color:skyblue;" class="py-2">Student Mangement System</h2>
		</a>
	</nav>
	<div class="container" id="page-container">
		<div class="row" id="content-wrap">
			<div class="col-sm">
			</div>
			<div class="col-sm">
				<div class="card" style="margin-top:150px;border-radius: 13px;background-color: skyblue; ">
					<h3 style="text-align:center;color:black;font-weight: 800; " class="pt-3">Login Form</h3>
					<label for="exampleInputPassword1" style="margin-top:10px;color:red;text-align:center;" id="error1">Please enter username and password</label>
					<div class="text-center" id="err_alert" style="">
						<div class="alert  mt-3 py-4" role="alert" style="width:84%;margin-left:33px;background-color:black; color:white;">
							Please fill the Requirements
						</div>
					</div>
					<?php
					if (isset($_GET['error_code'])) {
						$error_code = $_GET['error_code'];
						if ($error_code == 111) {
						?>
							<label for="exampleInputPassword1" style="margin-top:10px;color:balck;text-align:center;">Please enter name and password</label>
						<?php
						}
					}
					?>
					<div class="card-body">
						<form action="form_submit.php" method="post" id="formid">
							<div class="form-group mx-3">
								<label for="exampleInputPassword1" style="color:black;font-size:13px;">Admin Id</label>
								<input type="text" class="form-control mt-2" placeholder="Name of admin" name="name" autocomplete=off id="username" style="border-radius:7px;width:100%;font-size:16px;">
							</div>
							<label for="exampleInputPassword1" style="margin-left:0px;margin-top:10px;color:black;" id="error2" class="mx-3">please enter password</label>
							<?php
							if (isset($_GET['error_code'])) {
								$error_code = $_GET['error_code'];

								if ($error_code == 222) {
								?>
									<label for="exampleInputPassword1" style="margin-left:0px;margin-top:10px;color:red;">please enter username</label>
								<?php
								}
							}
							if (isset($_GET['error_code'])) {
								$error_code = $_GET['error_code'];
								if ($error_code == 444) {
									?>
									<label for="exampleInputPassword1" style="margin-left:0px;margin-top:10px;color:red;">invalid username</label>
								<?php
								}
							}
							?>
							<label for="exampleInputPassword1" style="margin-left:0px;margin-top:10px;color:red;" id="error4" class="mx-3">invalid username</label>
							<div class="form-group mt-4 mx-3">
								<label for="exampleInputPassword1" style="color:black;font-size:13px;">Password</label>
								<input type="password" class="form-control mt-2" placeholder="Password" name="password" autocomplete=off id="password" style="border-radius:7px;font-size:16px;">
							</div>
							<label for="exampleInputPassword1" style="margin-left:0px;margin-top:10px;color:red;" id="error3" class="mx-3">please enter password</label>
							<label for="exampleInputPassword1" style="margin-left:0px;margin-top:10px;color:red;" id="error5" class="mx-3">invalid password</label>
							<div class="py-4">
								<button type="submit" class="btn  mt-4 btn-block mx-3" id="submitbtn" style="width:92%;background-color:blue;color:white;">Log in</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm">
			</div>
		</div>
	</div>
</body>
<footer class=" text-center text-lg-start foot">	
	<div class="text-center p-3" style="background-color:skyblue;">
		© 2023 Copyright
		<a class="text-dark" href="#" style="text-decoration:none;">crescdatasoft</a>
	</div>	
</footer>
<script>
	$(document).ready(function() {
		$("#error1").hide();
		$("#error2").hide();
		$("#error3").hide();
		$("#error4").hide();
		$("#error5").hide();
		$("#err_alert").hide();

		$("#submitbtn").click(function(e) {
			let username = $("#username").val();
			let password = $("#password").val();

			if ((username == null || username == "") && (password == null || password == "")) {
				var allok = false;
				if (!allok) {
					e.preventDefault();
				}
				$("#error2").hide();
				$("#error3").hide();
				$("#err_alert").show();
				$("#username").css("border", "1px solid #E74C3C");
				$("#password").css("border", "1px solid #E74C3C");
			} else if (username == null || username == "") {
				var allok = false;
				if (!allok) {
					e.preventDefault();
				}
				$("#error1").hide();
				$("#error3").hide();
				$("#error2").show();
				$("#err_alert").hide();
			} else if (password == null || password == "") {
				var allok = false;
				if (!allok) {
					e.preventDefault();
				}
				$("#error1").hide();
				$("#error2").hide();
				$("#error3").show();
				$("#err_alert").hide();
			} else {
				var allok = false;
				if (!allok) {
					e.preventDefault();
				}
				let userInputId = $("#username").val();
				let userInputPassword = $("#password").val();
				$.ajax({
					url: 'http://localhost:8002/institute-managment/validate_user.php',
					data: {
						userInputId: userInputId,
						userInputPassword: userInputPassword
					},
					type: 'post',
					success: function(data) {

						if (data == 333) {
							$("#error1").hide();
							$("#error2").hide();
							$("#error3").hide();
							$("#error4").show();
							$("#err_alert").hide();
						} else if (data == 444) {
							$("#error1").hide();
							$("#error2").hide();
							$("#error3").hide();
							$("#error4").hide();
							$("#error5").show();
							$("#err_alert").hide();
						} else if (data == 555) {
							$("#formid").submit();
						}
					}
				});
			}
		});
	});
</script>
</html>