<?php
	session_start();

	if( isset($_SESSION["login"]) ){ 	//untuk mengecek apakah sebelumnya user sudah login, kalau sudah jangan diminta login lagi	
		if ($_SESSION['username'] == "admin"){
			header("Location: ../admin/index.php");
			exit;
		} else {
			header ("Location: ../student/index.php");
			exit;
		}
	}

	require '../includes/functions.php';

	if( isset($_POST["login"]) ){		//untuk login, ngambil username dan password dari inputan user, kalau sesuai dgn database
		$username = $_POST["username"];
		$password = $_POST["password"];

		$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

		//ambil email untuk disession biar bisa diecho
		$query = "SELECT email FROM user WHERE username = '$username'";
    	$email = mysqli_query($conn, $query);

		//cek username
		if( mysqli_num_rows($result) === 1 ){

		 	//cek password 
			$row = mysqli_fetch_assoc($result);

			if ( password_verify($password, $row["password"]) ){
				//set session username dan email
				$_SESSION['username'] = $username;
				$_SESSION['email'] = $row['email'];

				//set session login
				$_SESSION["login"] = true;
				// header("Location: ../student/index.php"); 
				// exit;
				if ($_SESSION['username'] == "admin"){
					header("Location: ../admin/index.php");
					exit;
				} else {
					header ("Location: ../student/index.php");
					exit;
				}
			}
		}
		$error = true;
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Page - AmbiVerse</title>
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
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login" style="background-image: url('../assets/img/bg-home.jpg');">
			<div class="wrap-login">

				<?php if( isset($error) ) : ?>
					<script>
						alert ("username/password salah!");
					</script>
				<?php endif; ?>
				
				<form class="login-form validate-form" action="" method="POST">
					<span class="login-form-logo">
						<a href="../index.php"><img src="../assets/img/A.png" width="75px" alt=""></a>
					</span>

					<span class="login-form-title p-t-20">Log in</span>
					
					<div style="text-align: center">
						<span class="txt1 toregister">Don't have an account? <a href="register.php">Register</a></span>
					</div>	

					<!-- username -->
					<div class="wrap-input validate-input" data-validate = "Enter username">
						<input class="input" type="text" name="username" id="username" placeholder="Username">
						<span class="focus-input" data-placeholder="&#xf207;"></span>
					</div>

					<!-- forgot password dan password --> 
					<div class="wrap-input validate-input" data-validate="Enter password">
						<input class="input" type="password" name="password" id="password" placeholder="Password">
						<span class="focus-input" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact-form-checkbox">
						<input class="input-checkbox" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox" for="ckb1">Remember me</label>
					</div>

					<div class="container-login-form-btn">
						<button type="submit" name="login" class="login-form-btn m-b-15">Login</button>
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

</body>
</html>