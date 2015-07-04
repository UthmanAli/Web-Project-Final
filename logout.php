<?php
	session_start();
	if(session_destroy()) 
	{
		setcookie("username", false, time()-1);
		setcookie("password", false, time()-1);
		header("Location: login.php"); 
	}
?>
