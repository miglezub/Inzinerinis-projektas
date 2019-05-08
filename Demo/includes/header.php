<?php
 
 require 'config/config.php';
 include("includes/classes/User.php");
 include("includes/classes/Post.php");
 include("includes/classes/Message.php");

if (isset($_SESSION['username']))
{
	//Paimama visa informacija apie useri pagal sesiojos username

	$userLoggedIn = $_SESSION['username']; //Isaugome i kintamaji username
	$user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'"); //pagal user name gauname duomenu bazes eilute
	$user = mysqli_fetch_array($user_details_query); // Konvertuojama i array kad agletume naudoti
}
else {
	header("Location: register.php");
}
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Studentbook</title>

    <!-- javascript -->
    <script
  src="http://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
  <script type="text/javascript" src="assets/js/bootstrap.js"></script>
  <script type="text/javascript" src="assets/js/demo.js"></script>
  <script type="text/javascript" src="assets/js/bootbox.js"></script>
  <script type="text/javascript" src="assets/js/jcrop_bits.js"></script>
  <script type="text/javascript" src="assets/js/jquery.jcrop.js"></script>
  
  <!-- css -->
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="assets/css/jquery.Jcrop.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  </head>
  <body>

  	<div class="top_bar">
  		<div class="logo">
  			<a href="index.php">StudentBook</a>
  		</div>

  		<nav>
  			<a href="<?php echo $userLoggedIn; ?>"> <?php echo $user['first_name']; ?> </i></a>
  			<a href="index.php"><i class="fas fa-home fa-lg"></i></a>
  			<a href="#"><i class="fas fa-envelope fa-lg"></i></a>
  			<a href="#"><i class="fas fa-bell fa-lg"></i></a>
  			<a href="requests.php"><i class="fas fa-users fa-lg"></i></a>
  			<a href="#"><i class="fas fa-cog fa-lg"></i></a>
  			<a href="includes/handlers/logout.php"><i class="fas fa-sign-out-alt fa-lg"></i></i></a>



  		</nav>
  		

  	</div>

  	<div class="wrapper">