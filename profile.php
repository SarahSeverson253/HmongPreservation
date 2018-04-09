<?php
/* Displays user information and some useful messages */
session_start();
// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else {
    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
	$location = $_SESSION['location'];
	$profession = $_SESSION['profession'];
	$goal = $_SESSION['goal'];
	$profileImageLocation = $_SESSION['profileImageLocation'];
    $active = $_SESSION['active'];
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Welcome <?= $first_name.' '.$last_name ?></title>
  <?php include 'css/css.html'; ?>
</head>

<body>
  <div class="form">

          <h1>Welcome</h1>
		  
		  <li class="tab active"><a href="submitImage.php">Click here to submit an image to the project.</a></li>
          
          <p>
          <?php 
     
          // Display message about account verification link only once
          if ( isset($_SESSION['message']) )
          {
              echo $_SESSION['message'];
              
              // Don't annoy the user with more messages upon page refresh
              unset( $_SESSION['message'] );
          }
          
          ?>
          </p>
          
          <?php
          
          // Keep reminding the user this account is not active, until they activate
          if ( !$active ){
              echo
              '<div class="info">
              Account is unverified, please confirm your email by clicking
              on the email link!
              </div>';
          }
          
          ?>
          
          <h2><?php echo $first_name.' '.$last_name; ?></h2>
		  <p>Profile Image: <?= $profileImageLocation ?></p>
          <p>Email Address: <?= $email ?></p>
		  <p>Location: <?= $location ?></p>
		  <p>Profession: <?= $profession ?></p>
		  <p>Goal: <?= $goal ?></p>

		  
		  <form action="uploadProfile.php" method="post" enctype="multipart/form-data" name="addroom">
		  Submit a profile image: <br />
		  <input type="file" name="image" class="ed"><br />
		   <input type="submit" name="Submit" value="Upload" id="button1" />
		  </form> 
		  <br /><br />
		  
          
          <a href="logout.php"><button class="button button-block" name="logout"/>Log Out</button></a>

    </div>
    
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>
