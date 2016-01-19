<?php
    $db = mysql_connect ("localhost","root","");
    mysql_select_db ("nbt",$db);
	$set=mysql_query("SET NAMES utf8",$db);
    ?>