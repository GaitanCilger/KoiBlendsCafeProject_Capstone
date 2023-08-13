<?php

	include('config/constants.php');

	if(isset($_POST['remove_all']))
	{
		unset($_SESSION['cart']);

		$_SESSION['allremove'] = "All Items Removed";
		header('location:'.SITEURL.'cart.php');
	}

?>