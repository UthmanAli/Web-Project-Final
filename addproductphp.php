<?php

 	//$error = "";
	
	
		
	 	if( empty($_POST["name"]) || empty($_POST["companyname"]) || empty($_POST["category"]) || empty($_POST["description"]) || empty($_POST["price"]) || empty($_POST["cost"]) || empty($_POST["imgadd"]) || empty($_POST["supplier"])) 
		{
			echo "Fill All Fields";
		}
		else 
		{
			
			$name = $_POST["name"]; 
			$cname = $_POST["companyname"]; 
			$category = $_POST["category"];
			$description = $_POST["description"];
			$price = $_POST["price"];
			$cost = $_POST["cost"];
			$units = $_POST["units"];
			$imgadd = $_POST["imgadd"];
			$supplier = $_POST["supplier"];
			
			if(!mysql_connect('localhost','root','')||!mysql_select_db('store'))
			{
				die('Could Not Connect');	
			}
			
			$q1 = "SELECT MAX(pid) AS max FROM products";
			$res = mysql_query($q1);

			while($row = mysql_fetch_array($res)) {
				$maxid = $row['max'];
				
			}
			
			$maxid = $maxid+1;
			

			$q = "INSERT INTO products (pid, name, cname, category, description, price, cost, units, imgAdd, supplier)VALUES('$maxid', '$name', '$cname', '$category', '$description', '$price', '$cost', '$units','$imgadd', '$supplier')";

			$query = mysql_query($q);

			if($query){ 
				echo "Success";
			}
			else
			{
				echo "Failed to Entered the Product!";
			} 			
		}

?>
