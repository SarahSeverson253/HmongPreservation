<?php

//connect to the database//
mysql_connect("sql206.byethost9.com","b9_21611491", "sh33ph3ad") or die(mysql_error());
mysql_select_db("b9_21611491_hmongPres") or die(mysql_error());

//requesting image id

$id = addslashes($_REQUEST['id']);

$image = mysql_query("SELECT * FROM images ORDER BY id DESC");


while($row = mysql_fetch_assoc($image))
{
        echo '<img src="showimage.php?id='.$row["id"].'">';
}

mysql_close();


?>