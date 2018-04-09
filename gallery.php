<!DOCTYPE html>

<html>
<head>
<title>Gallery</title>
</head>
<body>

<h1>The Hmong Preservation Project Gallery</h1>

<li class="tab active"><a href="search.php">Click here to use our archive search engine!</a></li>
<li class="tab active"><a href="index.php">Click here to return to the home page.</a></li>
<?php
include('config.php');
$result = mysql_query("SELECT * FROM photos");
while($row = mysql_fetch_array($result))
{
echo '<div id="imagelist">';
echo '<p><img src="'.$row['location'].'"></p>';
?>
Title:
<?php
echo '<p id="caption">'.$row['caption'].' </p>';
?>
Contributor:
<?php
echo '<p id="contributor">'.$row['contributor'].' </p>';
?>
Description:
<?php
echo '<p id="description">'.$row['description'].' </p>';
echo '</div>';
}
?> 
-->
</body>


</html>