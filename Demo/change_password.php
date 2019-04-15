<!-- Changing the password -->

<?php
require 'config/config.php';





	if(isset($_POST['res_button'])){
		 if(isset($_GET['email_hash']) && !empty($_GET['email_hash']) AND isset($_GET['pass_hash']) && !empty($_GET['pass_hash'])){
		 $new_password=md5($_POST['res_password']);
		$email_hash=$_GET['email_hash'];
		$pass_hash=$_GET['pass_hash'];
		mysqli_query($con, "UPDATE users SET password='$new_password' WHERE md5(email)='$email_hash'");
		}
		else {
			echo "Something went wrong";
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Change password >> Studentbook</title>
</head>
<body>
	<form action="" method="POST">
	<input type="password" name="res_password" placeholder="Enter password">
	<input type="password" name="res_password1" placeholder="Repeat password">
	<input type="submit" name="res_button" value="Submit">
	</form>
</body>
</html>