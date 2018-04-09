<!DOCTYPE html>
<html lang="en">
<body>
    <form action="submit.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="image"/>
		
		<br />
		<br />
		
		<p>Please choose a name for your image.</p>
		
		<input type="text" name="image_name" />
		
		<br />
		<br />
		
		<p>Please choose a contributor name (your name, "The ___ Family", etc...).</p>
		
		<input type="text" name="contributor" />
		
		<br />
		<br />
		
		<p>Please write a description of your image, such as names of people, location taken (if known),
		and stories attached to said image. The more details, the better; future generations and researchers
		will thank you!</p>
		
		<textarea name="image_des" rows="10" cols="30"></textarea>
		<br />
		<br />
		
		<input type="submit" name="submit" value="Upload"/>
    </form>
</body>
</html>

<?php
if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
		$image_name = $_POST['image_name'];
		$image_des = $_POST['image_des'];
		$contributor = $_POST['contributor'];


        /*
         * Insert image data into database
         */
        
        //DB details
        $dbHost     = 'sql206.byethost9.com';
        $dbUsername = 'b9_21611491';
        $dbPassword = 'sh33ph3ad';
        $dbName     = 'b9_21611491_hmongPres';
        
        //Create connection and select DB
        $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
        
        // Check connection
        if($db->connect_error){
            die("Connection failed: " . $db->connect_error);
        }
        
        $dataTime = date("Y-m-d H:i:s");
        
        //Insert image content into database
        $insert = $db->query("INSERT into images (image, image_name, image_des, contributor, created) VALUES ('$imgContent', '$image_name', '$image_des', '$contributor', '$dataTime')");
        if($insert){
            echo "File uploaded successfully.";
        }else{
            echo "File upload failed, please try again.";
        } 
    }else{
        echo "Please select an image file to upload.";
    }
}
?>