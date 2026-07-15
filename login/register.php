<?php

require '../includes/functions.php';
	
if( isset($_POST["signup"]) ){	//ketika btn 'signup' dipencet, jalankan fungsi register

	if( register($_POST) > 0 ){ //kalau fungsi register berhasil, tampilkan pesan 'buat akun berhasil'
		echo "<script>
				alert('Buat akun berhasil!');
				window.location='login.php';
			</script>";
	} else {
		echo mysqli_error($conn);
	}
	
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign Up Page - AmbiVerse</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main2.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login" style="background-image: url('../assets/img/bg-home.jpg');">
			<div class="wrap-login">
				<form class="login-form validate-form" action="" method="POST">
					<span class="login-form-logo">
						<a href="../index.php"><img src="../assets/img/A.png" width="75px" alt=""></a>
					</span>

					<span class="login-form-title p-t-20">Sign Up</span>

					<div style="text-align: center">
						<span class="txt1 toregister">Already have an account? <a href="login.php">Log In</a></span>
					</div>	

					<!-- input username  -->
					<div class="wrap-input validate-input" data-validate = "Enter username">
						<input pattern=".{3,30}" required title="3 to 50 characters"class="input" type="text" name="username" id="username" placeholder="Username">
						<span class="focus-input" data-placeholder="&#xf207;"></span>
					</div>

					<!-- input email  -->
                    <div class="wrap-input validate-input" data-validate = "Enter email address">
						<input class="input" type="email" name="email" id="email" placeholder="Email address">
						<span class="focus-input" data-placeholder="&#xf15a;"></span>
					</div>

					<!-- input password  -->
					<div class="wrap-input validate-input" data-validate="Enter password">
						<span class="focus-input" data-placeholder="&#xf191;"></span>
						<input pattern=".{8,30}" required title="8 to 30 characters" id="password" type="password" class="input-pass" name="password" placeholder="Password">
						<span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
					</div>

					<div class="container-login-form-btn">
						<button type="submit" name="signup" class="login-form-btn">Sign Up</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

	<script>
		$(".toggle-password").click(function() {

		$(this).toggleClass("fa-eye fa-eye-slash");
		var input = $($(this).attr("toggle"));
		if (input.attr("type") == "password") {
		input.attr("type", "text");
		} else {
		input.attr("type", "password");
		}
		});
	</script>
</body>
</html>