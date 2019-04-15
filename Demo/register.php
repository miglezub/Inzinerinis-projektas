<?php
require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';
?>

<!DOCTYPE html>
<html>
<head>

	<title>REGISTRATION >> Studentbook</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
	<script
  src="http://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
  <script type="text/javascript" src="assets/js/register.js"></script>
</head>
<body>

	<?php

		if(isset($_POST['register_button'])){
			echo '
				<script>
					$(document).ready(function(){
							$("#first").hide();
							$("#second").show();
						});
				</script>
			';
		}

	?>
	<div class="wrapper">

		<div class="login_box">
			<div class="login_header">
				<img id="logo" src="assets/images/backrounds/logo.png">

			</div>

			<div id="first">
				<form action="register.php" method="POST">



					<?php
					if(in_array("Email or password is incorrect", $error_array))
					{
						echo "Email or password is incorrect";
					}
					if(in_array("Email is not verified", $error_array))
					{
						echo "Email is not verified";
					}
					?>
					<br>
					<input type="email" name="log_email" placeholder="Enter email" value="<?php if(isset($_SESSION['log_email'])) {
						echo $_SESSION['log_email'];
					} 
					?>" required>
					<br>
					<input type="password" name="log_password" placeholder="Enter password" value="<?php if(isset($_SESSION['log_password'])) {
						echo $_SESSION['log_password'];
					} 
					?>" required>
					<br>
					<a href="reset_password.php">Forgot password?</a>
					<br>
					<input type="submit" name="login_button" value="Login">
					<br>
					<a href="#" id="signup" class="signup">Need an account? Register here!</a>

				</form>
			</div>


			<div id="second">
				<form action="register.php" method="POST">
					<input type="text" name="reg_fname" placeholder="First Name" value="<?php if(isset($_SESSION['reg_fname'])) {
						echo $_SESSION['reg_fname'];
					} 
					?>" required>
					<br>

					<?php
					if(in_array("First name must be between 2 and 25 characters <br>", $error_array))
					{
						echo "First name must be between 2 and 25 characters <br>";
					}
					?>

					<input type="text" name="reg_lname" placeholder="Last Name" value="<?php if(isset($_SESSION['reg_lname'])) {
						echo $_SESSION['reg_lname'];
					} 
					?>" required>
					<br>
					<?php
					if(in_array("Last name must be between 2 and 25 characters <br>", $error_array))
					{
						echo "Last name must be between 2 and 25 characters <br>";
					}
					?>
					<input type="email" name="reg_email" placeholder="Email" value="<?php if(isset($_SESSION['reg_email'])) {
						echo strtolower($_SESSION['reg_email']);
					} 
					?>" required>
					<br>

					<input type="email" name="reg_email2" placeholder="Confirm email" value="<?php if(isset($_SESSION['reg_email2'])) {
						echo strtolower($_SESSION['reg_email2']);
					} 
					?>" required>
					<br>

					<?php
					if(in_array("Email already in use <br>", $error_array))
					{
						echo "Email already in use <br>";
					}
					else if(in_array("Invalid email format <br>", $error_array))
					{
						echo "Invalid email format <br>";
					}
					else if(in_array("Emails dont match <br>", $error_array))
					{
						echo "Emails dont match <br>";
					}
					?>

					<input type="password" name="reg_password" placeholder="Password" required>
					<br>


					<input type="password" name="reg_password2" placeholder="Confirm password" required>
					<br>

					<?php
					if(in_array("Your passwords do not match <br>", $error_array))
					{
						echo "Your passwords do not match <br>";
					}
					else if(in_array("Your password can only contain english characters or numbers <br>", $error_array))
					{
						echo "Your password can only contain english characters or numbers <br>";
					}
					else if(in_array( "Your password must be between 5 and 30 characters <br>", $error_array))
					{
						echo  "Your password must be between 5 and 30 characters <br>";
					}
					?>

					<input type="submit" name="register_button" placeholder="Register">
					<br>
					<?php
					if(in_array("<span style='color: #14C800;'>Registration successful, verification email has been sent!</span><br>", $error_array))
					{
						echo "<span style='color: #14C800;'>Registration successful, verification email has been sent!</span><br>";
					}
					?>

					<a href="#" id="signin" class="signin">Already have an account? Sign in here!</a>

				</form>
			</div>
		</div>

	</div>
</div>
</body>
</html>