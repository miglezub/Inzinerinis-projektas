<!-- Resseting the password -->
<?php
require 'config/config.php';

$error_array = array();

if(isset($_POST['res_button']))
{

	$email = strip_tags($_POST['res_email']);
	$email_check = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");
	$row = mysqli_fetch_array($email_check);
	$pass_hash = $row['password'];
	$num_rows = mysqli_num_rows($email_check);
	if($num_rows > 0){
		array_push($error_array, "Reset link has been sent to your email");
		$email_hash = md5($email);
		
		
		$to=$email;
		$subject= 'Reset password';
		$message= '
		To reset your password press the link below:
		http://localhost/Demo/change_password.php?email_hash='.$email_hash.'&pass_hash='.$pass_hash.'
		';

		$headers='From:noreply@studentsbook.com' . "\r\n";
		mail($to, $subject, $message, $headers);
	}
	else array_push($error_array, "Email doesn't exist!");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>RESET PASSWORD >> Studentbook</title>
</head>
<body>

<form action="reset_password.php" method="POST">
	
	<input type="email" name="res_email" placeholder="Enter email">
	<input type="submit" name="res_button" value="Submit link">

</form>

</body>
</html>