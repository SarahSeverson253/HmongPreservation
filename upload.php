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
				
			move_uploaded_file($_FILES["image"]["tmp_name"],"archiveImages/" . $_FILES["image"]["name"]);
			
			$location="archiveImages/" . $_FILES["image"]["name"];
			$caption=$_POST['caption'];
			$contributor=$_POST['contributor'];
			$description=$_POST['description'];
			
			$save=mysql_query("INSERT INTO photos (location, caption, contributor, description) VALUES ('$location','$caption', '$contributor', '$description')");
			header("location: gallery.php?uploadsuccess");			
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