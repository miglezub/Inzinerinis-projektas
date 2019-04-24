<!-- Changing the password -->

<?php
require 'config/config.php';

$error_array = array();



	if(isset($_POST['res_button'])){
		 if(isset($_GET['email_hash']) && !empty($_GET['email_hash']) AND isset($_GET['pass_hash']) && !empty($_GET['pass_hash'])){
		 $new_password=md5($_POST['res_password']);
		$email_hash=$_GET['email_hash'];
		$pass_hash=$_GET['pass_hash'];
		mysqli_query($con, "UPDATE users SET password='$new_password' WHERE md5(email)='$email_hash'");
		array_push($error_array, "Success!");
		}
		else {
			array_push($error_array, "Something went wrong");
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Change password >> Studentbook</title>
	 <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="assets/css/reset_password.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
	<div id="reset_box">
		<b>Enter your new password</b>
		<hr>
	<form action="" method="POST">
	<input type="password" name="res_password" placeholder="Enter password">
	<input type="password" name="res_password1" placeholder="Repeat password">
	<input type="submit" name="res_button" value="Submit">
	</form>

	<?php if(in_array("Success!", $error_array))
					{
						echo "Success! You can now login with your new password.";
					}
					if(in_array("Something went wrong", $error_array))
					{
						echo "Something went wrong";
					}
					?>
</div>
</div>
</body>
</html>