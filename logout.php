<?php

	//Include also constant.php for connection(SITEURL)
	include('config/constants.php');

	//Destroy the session
	unset($_SESSION['user']);

	$_SESSION['userout'] = "Logout Successfully";
	header('location:'.SITEURL.'index.php');

?>