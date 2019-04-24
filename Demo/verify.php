<!DOCTYPE html>
<html>
<head>
	<title>Verification</title>
	
     <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="assets/css/reset_password.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
	<!-- start header div --> 
    <div id="header">
        
    </div>
    <!-- end header div -->   
     
    <!-- start wrap div -->   
    <div id="reset_box">
        <!-- start PHP code -->
        <h3>Verification:</h3>
        <?php
         	require 'config/config.php';
            mysqli_select_db($con, "social") or die(mysqli_error($con)); // Select database.    
            if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    			// Verify data
    			$email = mysqli_escape_string($con, $_GET['email']); // Set email variable
    			$hash = mysqli_escape_string($con, $_GET['hash']); // Set hash variable
    			$search = mysqli_query($con, "SELECT email, hash, active FROM users WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysqli_error($con)); 
				$match  = mysqli_num_rows($search);

				if($match > 0){
        		// We have a match, activate the account
        		mysqli_query($con, "UPDATE users SET active='1' WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysqli_error($con));
        		echo '<div class="statusmsg">Your account has been activated, you can now login</div>';
    			}else{
        		// No match -> invalid url or account has already been activated.
        		echo '<div class="statusmsg">The url is either invalid or you already have activated your account.</div>';
    			}
                 
				}else{
    			// Invalid approach
    			echo '<div class="statusmsg">Invalid approach, please use the link that has been send to your email.</div>';
    	}
    	?>
        <!-- stop PHP Code -->
          
    </div>
    <!-- end wrap div --> 
</body>
</html>