<?php
$query = mysql_query("SELECT image FROM images WHERE id = ".$_GET['id']);
$row = mysql_fetch_assoc($query);
header("Content-type: image/jpg");
echo $row['image'];
?>