<?php
include('config.php');
if (!isset($_FILES['image']['tmp_name'])) {
	echo "";
	}else{
	$file=$_FILES['image']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name= addslashes($_FILES['image']['name']);
	$imageSize = $_FILES['image']['size'];
	$imageError = $_FILES['image']['error'];
	$imageType = $_FILES['image']['type'];
	
	$imageExt = explode('.', $image_name);
	$imageActualExt = strtolower(end($imageExt));
	
	$allowed = array ('jpg', 'jpeg', 'png');
	
	if (in_array($imageActualExt, $allowed)) {
		
		if ($imageError === 0) {
			if ($imageSize < 5000000) {
				
			move_uploaded_file($_FILES["image"]["tmp_name"],"userImageFolder/" . $_FILES["image"]["name"]);
			
			$profileImageLocation="userImageFolder/" . $_FILES["image"]["name"];
			
			$save=mysql_query("UPDATE users SET 'profileImageLocation'=$profileImageLocation WHERE 'email'=$email");
			header("location: profile.php?uploadsuccess");			
			} else {
				echo "Your file is too big (must be under 500MB).";
			}
			
		} else {
			echo "There was an error uploading your file.";
		}
		
	} else {
		echo "You can't upload files that aren't JPG, JPEG, or PNG.";
	}				
}
?>