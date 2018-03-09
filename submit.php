<?php
if(isset($_POST["submit"]))
{
$img_title=$_POST["imageName"];
$img_title=$_POST["contributor"];
$img_desc=$_POST["description"];
}
$img_name=$_FILES["uploadedfile"]["name"];
if (($_FILES["uploadedfile"]["type"]=="image/png"
|| $_FILES["uploadedfile"]["type"]=="image/jpeg"
|| $_FILES["uploadedfile"]["type"]=="image/jpg"
&& $_FILES["uploadedfile"]["size"]<50000))
{
if ($_FILES["uploadedfile"]["error"]>0)
{
echo "Return Code:".$_FILES["uploadedfile"]["error"]."<br />";
}
else
{
$i=1;
$success=false;
$new_img_name=$img_name;
while(!$success)
{
if (file_exists("uploads/".$new_img_name))
{
$i++;
$new_img_name="$i".$img_name;
}
else
{
$success=true;
}
}
move_uploaded_file($_FILES["uploadedfile"]["tmp_name"],"uploads/".$new_img_name);
echo "Stored in: "."uploads/".$new_img_name;
echo "<br />";
$qry="INSERT INTO images(img_title,img_desc,img_filename)
VALUES('$img_title','$img_desc','$new_img_name')";
if(!mysql_query($qry))
{
die("An error".mysql_error());
}
else
{
echo "1 row added";
}
}
}
else
{
echo "Invalid file";
}
?>
<html>
<body>

<h1>Submit an Image to the Archive</h1><br /><br />
<form enctype="multipart/form-data" action="anonSubmit.php" method="POST">

<h2>NOTE: If you would like your image to be saved as a part of your
personal user gallery and/or to keep track of your submitted images for
future reference, please login and use the user submit page. Images submitted
here will only show up in the general gallery under the contributor name
of your choice!
</h2>

<br />
<br />
<p>
Please give your image a name:
</p>

Image Title: <input type="text" name="imageName" /><br /><br />

<p>
Please identify under which name or group you would like the 
image to be submitted (your name, "The ___ Family", etc...):
</p>

Contributor Name: <input type="text" name="contributor" /><br /><br />

<p>
Please enter in any details you wish about your photo, including 
names of those within the photo, location taken (if known), 
stories related to the photo, etc... The more, the better; future 
generations and researchers will thank you! Please keep under 
10,000 characters. 
</p>

Description: <br /><br /><textarea rows="10" cols="70" maxlength="10000" name="description" />


</textarea>
<p>
Please make sure your image is in either PNG, JPG, or JPEG format.
</p>

Upload: <input name="uploadedfile" type="file" /><br /><br />
<input name="submit" type="submit" value="submit" />
</form>
</body>
</html>
