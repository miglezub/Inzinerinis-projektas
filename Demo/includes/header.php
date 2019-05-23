<?php
 
 require 'config/config.php';
 include("includes/classes/User.php");
 include("includes/classes/Post.php");
 include("includes/classes/Message.php");
 include("includes/classes/Notification.php");

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
  			<?php
          $messages = new Message($con, $userLoggedIn);
          $num_messages = $messages->getUnreadNumber();

          $notifications = new Notification($con, $userLoggedIn);
          $num_notifications = $notifications->getUnreadNumber();

          $user_obj = new User($con, $userLoggedIn);
          $num_requests = $user_obj->getNumberOfFriendRequests();
        ?>

        <a href="<?php echo $userLoggedIn; ?>">
          <?php echo $user['first_name']; ?>
        </a>
  			<a href="index.php">
          <i class="fas fa-home fa-lg"></i>
        </a>
  			<a href="javascript:void(0);" onclick="getDropdownData('<?php echo $userLoggedIn; ?>', 'message')">
          <i class="fas fa-envelope fa-lg"></i>
          <?php
            if($num_messages > 0)
              echo '<span class="notification_badge" id="unread_message">' . $num_messages . '</span>';
            ?>
        </a>
  			<a href="javascript:void(0);" onclick="getDropdownData('<?php echo $userLoggedIn; ?>', 'notification')">
          <i class="fas fa-bell fa-lg"></i>
            <?php
            if($num_notifications > 0)
              echo '<span class="notification_badge" id="unread_notification">' . $num_notifications . '</span>';
            ?>
          
        </a>
  			<a href="requests.php">
          <i class="fas fa-users fa-lg"></i>
          <?php
            if($num_requests > 0)
              echo '<span class="notification_badge" id="unread_requests">' . $num_requests . '</span>';
            ?>
        </a>
  			<a href="#">
          <i class="fas fa-cog fa-lg"></i>
        </a>
  			<a href="includes/handlers/logout.php">
          <i class="fas fa-sign-out-alt fa-lg"></i>
        </a>

  		</nav>
 
      <div class="dropdown_data_window" style="height:0px; border:none;"></div>
      <input type="hidden" id="dropdown_data_type" value="">

  	</div>


    <script>
    $(function(){
 
    var userLoggedIn = '<?php echo $userLoggedIn; ?>';
    var dropdownInProgress = false;
 
      $(".dropdown_data_window").scroll(function() {
        var bottomElement = $(".dropdown_data_window a").last();
      var noMoreData = $('.dropdown_data_window').find('.noMoreDropdownData').val();
 
          // isElementInViewport uses getBoundingClientRect(), which requires the HTML DOM object, not the jQuery object. The jQuery equivalent is using [0] as shown below.
          if (isElementInView(bottomElement[0]) && noMoreData == 'false') {
              loadPosts();
          }
      });
 
      function loadPosts() {
          if(dropdownInProgress) { //If it is already in the process of loading some posts, just return
        return;
      }
      
      dropdownInProgress = true;
 
      var page = $('.dropdown_data_window').find('.nextPageDropdownData').val() || 1; //If .nextPage couldn't be found, it must not be on the page yet (it must be the first time loading posts), so use the value '1'
 
      var pageName; //Holds name of page to send ajax request to
      var type = $('#dropdown_data_type').val();
 
      if(type == 'notification')
        pageName = "ajax_load_notifications.php";
      else if(type == 'message')
        pageName = "ajax_load_messages.php";
 
      $.ajax({
        url: "includes/handlers/" + pageName,
        type: "POST",
        data: "page=" + page + "&userLoggedIn=" + userLoggedIn,
        cache:false,
 
        success: function(response) {
 
          $('.dropdown_data_window').find('.nextPageDropdownData').remove(); //Removes current .nextpage 
          $('.dropdown_data_window').find('.noMoreDropdownData').remove();
 
          $('.dropdown_data_window').append(response);
 
          dropdownInProgress = false;
        }
      });
      }
 
      //Check if the element is in view
      function isElementInView (el) {
          var rect = el.getBoundingClientRect();
 
          return (
              rect.top >= 0 &&
              rect.left >= 0 &&
              rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) && //* or $(window).height()
              rect.right <= (window.innerWidth || document.documentElement.clientWidth) //* or $(window).width()
          );
      }
    });
 
   </script>

  	<div class="wrapper">