<?php
 require 'config/config.php';

if (isset($_SESSION['username'])) {
	$userLoggedIn=$_SESSION['username'];
	$user_details_query=mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
	$user=mysqli_fetch_array($user_details_query);
}
else {
	header("Location: register.php"); //if username is not set redirects user to login page
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Studentbook</title>

    <!-- Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

  </head>
  <body>
  	<div class="top_bar">
  		<div class="logo">
  			<a href="index.php">Studentbook</a>
  		</div>

  		<nav>
  			<a href="#">
  				<?php echo $user['first_name']; ?>
  			</a>
  			<a href="#">
  				<i class="fas fa-home fa-lg"></i>
  			</a>
  			<a href="#">
  				<i class="far fa-envelope fa-lg"></i>
  			</a>
  			<a href="#">
  				<i class="far fa-bell fa-lg"></i>
  			</a>
  			<a href="#">
  				<i class="fas fa-users fa-lg"></i>
  			</a>
  			<a href="#">
  				<i class="fas fa-cog fa-lg"></i>
  			</a>
  			<a href="#">
  			<i class="fas fa-door-open fa-lg"></i>
  			</a>
  		</nav>
  	</div>