<?php

	include('config/constants.php');

	if($_SERVER["REQUEST_METHOD"]=="POST")
	{

		if(isset($_POST['cartsub']))
		{
			if(isset($_SESSION['cart']))
			{
				$incart = array_column($_SESSION['cart'], 'Item');
				if(in_array($_POST['product_name'],$incart))
				{
					$_SESSION['incart'] = "Item Already Added";
					header('location:'.SITEURL.'menu.php');
				}
				else
				{

					$count = count($_SESSION['cart']);
					$_SESSION['cart'][$count] = array('Item'=>$_POST['product_name'], 'Price'=>$_POST['product_price'],'Image'=>$_POST['product_image'],'Qty'=>1);

					$_SESSION['additem'] = "Item Added";
					header('location:'.SITEURL.'menu.php');
				}
			}
			else
			{
				$_SESSION['cart'][0] = array('Item'=>$_POST['product_name'], 'Price'=>$_POST['product_price'],'Image'=>$_POST['product_image'],'Qty'=>1);

				$_SESSION['additem'] = "Item Added";
				header('location:'.SITEURL.'menu.php');
			}
		}

		if(isset($_POST['viewmore']))
		{
			header('location:'.SITEURL.'menu.php');
		}

	}

?>