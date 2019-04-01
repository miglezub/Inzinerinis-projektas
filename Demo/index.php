<?php 
include("includes/header.php");
include("includes/classes/User.php");
include("includes/classes/Post.php");

if(isset($_POST['post'])) {
	$post=new Post($con, $userLoggedIn);
	$post->submitPost($_POST['post_text'], 'none');
}
//session_destroy(); //destroys all session variables
 ?>
    <div class="user_details column">  <!-- adds user_details and column classes -->
    	<a href="<?php echo $userLoggedIn; ?>"> <img src="<?php echo $user['profile_pic']; ?>"> </a>
    	<div class="user_details_left_right">
	    	<a href="<?php echo $userLoggedIn; ?>"> <!-- link to profile page will appear here -->
	    		<?php 
	    		echo $user['first_name'] . " " . $user['last_name'];
	    	 	?>
	    	</a>
	    	<?php 
	    	 	echo "Posts: " . $user['num_posts'] . "<br>";
	    	 	echo "Likes: " . $user['num_likes'];
    	  	?>
    	</div>
    </div>

    <div class="main_column column">
    	<form class="post_form" action="index.php" method="POST">
    		<textarea name="post_text" id="post_text" placeholder="Go ahead and post something!"></textarea>
    		<input type="submit" name="post" id="post_button" value="Post">
    		<hr>
    	</form>
    </div>

  </div> <!-- closes wrapper in header.php -->
  </body>
</html>
