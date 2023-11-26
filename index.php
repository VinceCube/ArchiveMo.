<!DOCTYPE html>
<html>

<head>
	<title>ArchiveMo</title>
	<!-- Vendor CSS Files -->
	<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="img/logo3.png" rel="icon">

	<script src="assets/vendor/testLocalJs/sweetalert.min.js"></script>
	<!-- testLocalJS CJ-->
	<script src="assets/vendor/testLocalJs/jquery.min.js"></script>
	<script src="assets/vendor/testLocalJs/popper.min.js"></script>
	<script src="assets/vendor/testLocalJs/bootstrap.min.js"></script>
	<script src="assets/vendor/testLocalJs/dataTables.min.js"></script>
	<script src="assets/vendor/testLocalJs/bootstrap4.min.js"></script>
	<script src="assets/js/jquery.js"></script>

	
</head>

<?php
session_start();
include 'dbconn.php';

if (isset($_SESSION['message'])) {
	echo $_SESSION['message'];
	unset($_SESSION['message']);
}

if (isset($_SESSION['useremail'])) {
	header("location:home.php");
} else {

	if (isset($_POST['login'])) {
		$email = $_POST['email'];
		$user_password = $_POST['password'];

		$sql = "SELECT * FROM users WHERE email = '" . $email . "'";
		$result = mysqli_query($conn, $sql);

		if ($result->num_rows == 0) {
			$_SESSION['message'] = '   ` <script>
	swal("Login Failed!", "Email incorrect. Please check the email before logging in.", "warning");
	</script>`';
			echo "<script>window.location.href = 'index.php';</script>";
			exit();
		}
		$user = mysqli_fetch_object($result);
		if (!password_verify($user_password, $user->password)) {
			$_SESSION['message'] = '   ` <script>
	swal("Login Failed!", "Password is incorrect. Please check the password before logging in.", "warning")
	</script>`';
			echo "<script>window.location.href = 'index.php';</script>";
			exit();
		}

		if ($user->verified_at == null) {
			// Bootstrap modal to notify the user to verify their email
			echo '
			<div class="modal fade" id="verifyEmailModal" tabindex="-1" role="dialog" aria-labelledby="verifyEmailModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="verifyEmailModalLabel">Email Verification Required</h5>
							<button type="button" id="close" class="btn-danger btn-close" data-dismiss="modal" aria-label="Close">
							</button>
						</div>
						<div class="modal-body">
						
							Please verify your email. <a href="email-verify.php?email=' . $email . '">Click here to verify</a>
						</div>
					</div>
				</div>
			</div>';

			// Script to show the modal when the page loads
			echo '<script>
			document.addEventListener("DOMContentLoaded", function() {
				var myModal = new bootstrap.Modal(document.getElementById("verifyEmailModal"));
				myModal.show();
			});
			</script>';
		} else {
			$_SESSION['useremail'] = $email;
			header('Location: home.php');
		}
	}
}
?>

<body>

	<div class="header">
		<div class="header-content">
			<img src="img/logo.png" alt="" class="logo">
		</div>
	</div>
	<div class="wave">
		<svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
			<path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
			<path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
			<path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
		</svg>
	</div>
	<div class="container">
		<div class="img">
			<img src="img/login.svg">
		</div>
		<div class="login-content">
			<form action="index.php" method="POST" autocomplete="off">
				<h1 class="title">Welcome!</h1>
				<h4>Login to continue.</h4>
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-user"></i>
					</div>
					<div class="div">
						<h5>Username</h5>
						<input type="text" class="input" name="email">
					</div>
				</div>
				<div class="input-div pass">
					<div class="i">
						<i class="fas fa-lock"></i>
					</div>
					<div class="div">
						<h5>Password</h5>
						<input type="password" class="input" name="password">
					</div>
				</div>
				<div class="col-12" style="text-align: right; padding: 3px 0;">
						 <a href="index.php" class="forgot" style="font-size: small;">Forgot Password?</a>
                    </div>
				<input type="submit" class="button" value="Login" name="login">
				<div class="col-12">
                      <p style="font-size: small;">Does'nt have an accout? <a href="signupmail.php" style="font-size: small;">Sign up here</a></p>
                    </div>
			</form>
		</div>
	</div>

	<script type="text/javascript" src="main.js"></script>

	<div class="footer">
		<footer>
			<div class="row">
				<div class="col">

				</div>
				<div class="col">

				</div>
				<div class="col">

				</div>
			</div>
		</footer>
	</div>
</body>

</html>