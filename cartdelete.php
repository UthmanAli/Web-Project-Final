<?php

	$proid = $_POST["pid"]; 

	if(!mysql_connect('localhost','root','')||!mysql_select_db('store'))
	{
		echo "DB_ERROR";
	}

	$delete = "DELETE FROM cart WHERE proid = $proid LIMIT 1";
	$qdelete = mysql_query($delete);

	if($qdelete){
		echo "Success";
	}
	
?>
