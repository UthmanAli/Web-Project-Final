<?php

	session_start();
	$error = "";
 	


	if (isset($_COOKIE["username"]) && isset($_COOKIE["password"]))
	{
		

		if(!mysql_connect('localhost','root','')||!mysql_select_db('store'))
		{
				die('Could Not Connect');	
		}

		$un = $_COOKIE["username"];
		
		$q = "SELECT * FROM login WHERE userID = '$un'";
		$query = mysql_query($q);
		if($query)
		{ 
			if(mysql_num_rows($query)>0)
			{
				while($row=mysql_fetch_array($query))
				{
					$Name1=$row['userID'];
					$pas1=$row['password'];
					$rank1=$row['rank'];
				}	
				if($_COOKIE["username"] == $Name1 && $_COOKIE["password"] == $pas1)
				{
					$_SESSION["login_user"] = $Name1;
				}
			}
		} 
	}   

	


	if(isset($_POST["submit"]))
	{
		

		if(empty($_POST["username"]) || empty($_POST["password"])) 
		{
			$error = "Fill All Fields!";	
		}
		else 
		{
			
			$username = $_POST["username"]; 
			$password = $_POST["password"];
		

	
			
			if(!mysql_connect('localhost','root','')||!mysql_select_db('store'))
			{
				die('Could Not Connect');	
			}

			$q = "SELECT * FROM login WHERE userID = '$username'";
			$query = mysql_query($q);

			if($query){ 
				if(mysql_num_rows($query)>0){

					while($row=mysql_fetch_array($query)){
						$Name=$row['userID'];
						$pas=$row['password'];
						$rank=$row['rank'];
					}
					
					if($Name == $username && $pas == $password){
						$_SESSION["login_user"] = $username;
						$_SESSION["rank"] = $rank;
						
						if(isset($_POST["box"])){
							setcookie("username", $username, time()+60*60*24*365);
							setcookie("password", $password, time()+60*60*24*365);
						}
						//
						//
					}
					else{
						$error = "Invalid Username or Pasword!";
					}

				}
				else{
					$error = "User Doesn't Exist!\n Please Sign Up!";
				}
			}
			else{
				$error = "Query Didn't Run!";
			}	
		}
	}
	
?>
