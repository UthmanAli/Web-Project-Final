<?php
	
	//var_dump($_GET);
	
	$proid = $_POST["pid"]; 
	$ip = $_SERVER['REMOTE_ADDR'];

					
	if(!mysql_connect('localhost','root','')||!mysql_select_db('store'))
	{
		echo "DB_ERROR";
	}
	// $create = " CREATE TABLE cart (
	// 			'cid' INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	// 			'proid' INT NOT NULL ,
	// 			'qty' INT NOT NULL
	// 		)";

	$search = "INSERT INTO  cart(ip, proid, qty) VALUES ('$ip', '$proid', '1')";
	$qSearch = mysql_query($search);

?>
