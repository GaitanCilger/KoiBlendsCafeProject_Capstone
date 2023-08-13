<?php

	include('config/constants.php');

	if(isset($_POST['remove_item']))
	{
		foreach($_SESSION['cart'] as $key => $value)
		{
			if($value['Item'] ==$_POST['vitem'])
			{
			unset($_SESSION['cart'][$key]);
			$_SESSION['cart']=array_values($_SESSION['cart']);

			$_SESSION['itemremoved'] = "Item Removed";
			header('location:'.SITEURL.'cart.php');
			}
		}
	}
	
	

?>