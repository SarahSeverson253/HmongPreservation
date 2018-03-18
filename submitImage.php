<!DOCTYPE html>
<?php 
require 'db.php';
?>
<html>
<head>
<title>Upload Images</title>
<!-------Including jQuery from Google ------>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="script.js"></script>

<!------- Include CSS File Here ------>
<link rel="stylesheet" type="text/css" href="uploadCSS.css">

<body>

<div id="maindiv">

<div id="formdiv">

<h2>Image Upload</h2>

<form enctype="multipart/form-data" action="" method="post">

You must upload at least one image. Only JPEG,PNG,JPG type images are allowed. Image size should be less than 1GB.
<div id="filediv">

<input name="file[]" type="file" id="file"/><br /><br />
Title of Image:<br /><input name="title" type="text" id="title" /><br /><br />
Contributor Name (your name, your family, etc...):<input name="contrib" type="text" id="contrib" /><br /><br />
<textarea id="description" name="description" rows="10" cols="50" placeholder="Please add some details about your image; location, stories, people, etc..."></textarea>

</div>
<input type="button" id="add_more" class="upload" value="Add More Files"/>
<input type="submit" value="Upload File" name="submit" id="upload" class="upload"/>

</form>
<!------- Including PHP Script here ------>
<?php include "upload.php"; ?>
</div>
</div>
</body>
</html>

