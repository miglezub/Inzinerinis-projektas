<?php

$fname = ""; //vardas
$lname = ""; //pavarde
$email = ""; //pastas
$email2 = ""; //patvirtinamasis pastas
$password = ""; //slaptazodis
$password2 = ""; //patvirtinimas slaptazodzio
$date = ""; //prisijungimo data
$error_array = array(); // klaidu sarasas

if(isset($_POST['register_button'])) //jeigu input register_button paspaudziamas einama i sita if salyga
{
	//Registracijos forma

	//VARDAS
	$fname = strip_tags($_POST['reg_fname']); //strip_tags del saugumo kad html elemtnu negaletu buti
	$fname = str_replace(' ', '', $fname); //pasalina tarpus po vardo ar pries
	$fname = ucfirst(strtolower($fname)); // palieka tik pirma raide didziaja
	$_SESSION['reg_fname'] = $fname; //Patalpina varda i sesija

	//PAVARDE
	$lname = strip_tags($_POST['reg_lname']); //strip_tags del saugumo kad html elemtnu negaletu buti
	$lname = str_replace(' ', '', $lname); //pasalina tarpus po vardo ar pries
	$lname = ucfirst(strtolower($lname)); // palieka tik pirma raide didziaja
	$_SESSION['reg_lname'] = $lname; //Patalpina varda i sesija

	//EMAIL
	$email = strip_tags($_POST['reg_email']); //strip_tags del saugumo kad html elemtnu negaletu buti
	$email = str_replace(' ', '', $email); //pasalina tarpus po vardo ar pries
	$email = ucfirst(strtolower($email)); // palieka tik pirma raide didziaja
	$_SESSION['reg_email'] = $email; //Patalpina varda i sesija

	//EMAIL2
	$email2 = strip_tags($_POST['reg_email2']); //strip_tags del saugumo kad html elemtnu negaletu buti
	$email2 = str_replace(' ', '', $email2); //pasalina tarpus po vardo ar pries
	$email2 = ucfirst(strtolower($email2)); // palieka tik pirma raide didziaja
	$_SESSION['reg_email2'] = $email2; //Patalpina varda i sesija

	//PASSWORD
	$password = strip_tags($_POST['reg_password']); //strip_tags del saugumo kad html elemtnu negaletu buti
	$_SESSION['reg_password'] = $password; //Patalpina varda i sesija

	//PASSWORD2
	$password2= strip_tags($_POST['reg_password2']); //strip_tags del saugumo kad html elemtnu negaletu buti
	$_SESSION['reg_password2'] = $password2; //Patalpina varda i sesija

	//DATA
	$date = date("Y-m-d"); //gauna prisijungimu data

	if($email == $email2) {
		if(filter_var($email, FILTER_VALIDATE_EMAIL)) //patikrina ar atitinka formata emailo
		{
			$email = filter_var($email, FILTER_VALIDATE_EMAIL);

			//Patikrinti ar email egzistuoja
			$email_check = mysqli_query($con, "SELECT email FROM users WHERE email='$email'");

			//Skaicius eiluciu su tokiu emailu, turi buti 0 arba 1
			$num_rows = mysqli_num_rows($email_check);

			if($num_rows > 0){
				array_push($error_array, "Email already in use <br>");
			}
		}
		else {
			array_push($error_array, "Invalid email format <br>");
		}
	}
	else
	{
		
		array_push($error_array, "Emails dont match <br>");
	}

	if(strlen($fname) > 25 || strlen($fname) < 2)
	{
		
		array_push($error_array, "First name must be between 2 and 25 characters <br>");
	}

	if(strlen($lname) > 25 || strlen($lname) < 2)
	{
		
		array_push($error_array, "Last name must be between 2 and 25 characters <br>");
	}

	if($password != $password2)
	{
		
		array_push($error_array, "Your passwords do not match <br>");
	}
	else
	{
		if(preg_match('/[^a-zA-Z0-9]/', $password))
		{
			
			array_push($error_array, "Your password can only contain english characters or numbers <br>");
		}
	}

	if(strlen($password) > 30 || strlen($password) < 5)
	{
		
		array_push($error_array, "Your password must be between 5 and 30 characters <br>");
	}



	if(empty($error_array)) {
		$password = md5($password); //slaptazodzio uzkodavimas

		//Sugeneruojamas username pagal varda ir pavarde
		$username = strtolower($fname . "_" . $lname);
		$check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
		$i = 0;
		//jeigu egzistuoja
		while(mysqli_num_rows($check_username_query) != 0){
			$i++;
			$username = $username . "_" . $i;
			$check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
		}

		//Profilio nuotrauka
		$rand = rand(1, 16);
		$profile_pic = "assets/images/profile_pics/defaults/" . $rand . ".png";
		$email_low_case = strtolower($email);
		//$query = mysqli_query($con, "INSERT INTO users VALUES ('', '$fname', '$lname', '$username', '$email_low_case', '$password', '$date', '$profile_pic', '0', '0', 'no', ',')");

		array_push($error_array, "<span style='color: #14C800'>You are all set, go log in!</span><br>");

		$_SESSION['reg_fname'] = "";
		$_SESSION['reg_lname'] = "";
		$_SESSION['reg_password'] = "";
		$_SESSION['reg_password2'] = "";
		$_SESSION['reg_email'] = "";
		$_SESSION['reg_email2'] = "";


		$hash=md5( rand(0,1000));//random 32 character hash to be used for email verification
		$query=mysqli_query($con, "INSERT INTO users VALUES ('','$fname', '$lname', '$username', '$email_low_case', '$password', '$date', '$profile_pic', '0', '0', 'no', ',', '$hash', '0')");
		array_push($error_array, "<span style='color: #14C800;'>Registration successful, verification email has been sent!</span><br>");

		//Clear session variables
		session_unset();
		session_destroy();

		//verification email
		$to=$email;
		$subject= 'Signup verification';
		$message= '
		Thanks for signing up!
		Please click this link to activate your account:
		http://localhost/Demo/verify.php?email='.$email.'&hash='.$hash.'
		';

		$headers='From:noreply@studentsbook.com' . "\r\n";
		mail($to, $subject, $message, $headers);
	}

}

?>