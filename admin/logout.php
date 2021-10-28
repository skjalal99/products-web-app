<?php

session_start(); //to ensure you are using same session
session_destroy(); //destroy the session

	
	header("Location:../admin/login.php?loggedout=".urlencode('You have been successfully logged out!'));



?>