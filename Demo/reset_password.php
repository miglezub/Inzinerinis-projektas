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
	 <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="assets/css/reset_password.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
<div id="reset_box">
	<b>Enter your email to reset your password</b>
<form id="reset_password" action="reset_password.php" method="POST">
	
	<input type="email" name="res_email" placeholder="Enter email">
	<input type="submit" name="res_button" value="Submit link">

</form>
	<?php
					if(in_array("Reset link has been sent to your email", $error_array))
					{
						echo "Reset link has been sent to your email";
					}
					if(in_array("Email doesn't exist!", $error_array))
					{
						echo "Email doesn't exist!";
					}
					?>
</div>

</body>
</html>