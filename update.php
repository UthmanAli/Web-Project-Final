<?php
	
		if( empty($_POST["name"]) || empty($_POST["cname"]) || empty($_POST["cate"]) || empty($_POST["des"]) || empty($_POST["price"]) || empty($_POST["cost"]) || empty($_POST["imgadd"]) || empty($_POST["sup"])) 
		{
			echo "Fill All Fields";
		}
		else 
		{
			$pid = $_POST["id"];
			$name = $_POST["name"]; 
			$cname = $_POST["cname"]; 
			$category = $_POST["cate"];
			$description = $_POST["des"];
			$price = $_POST["price"];
			$cost = $_POST["cost"];
			$units = $_POST["units"];
			$imgadd = $_POST["imgadd"];
			$supplier = $_POST["sup"];
			
			if(!mysql_connect('localhost','root','')||!mysql_select_db('store'))
			{
				die('Could Not Connect');	
			}
			$query="UPDATE products SET 
					name = '$name',
					cname = '$cname',
					category = '$category',
					description = '$description',
					price = '$price',
					cost = '$cost',
					units = '$units',
					imgAdd = '$imgadd',
					supplier = '$supplier'
										 WHERE pid = '$pid' LIMIT 1 ";
			
			$result = mysql_query($query);

			if ($result) {
				echo "Success";
			}
			else{
				echo "Failed";
			}
		}
?>
