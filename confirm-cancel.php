<?php

	//include constant.php file
	include('config/constants.php');

	if(isset($_POST['cno']))
	{
		header('location:'.SITEURL.'orders.php');
	}

	if(isset($_POST['cancel']))
	{
		$id = $_POST['id'];
		$remarks = $_POST['remarks'];

		$sql = "UPDATE m_order SET 
			status = 'Cancelled',
			notif = 0,
			notif2 = 0,
			remarks = '$remarks'
			WHERE id = '$id'
		";

		//Execute query
		$res = mysqli_query($conn, $sql);

		//Check if the query execute successfully or not
		if($res==true)
		{
			$_SESSION['cancel-order'] = "Order Cancelled";
			
			header('location:'.SITEURL.'orders.php');
		}
		else
		{
			$_SESSION['cancel-order'] = "Failed to Cancel Order";
			
			header('location:'.SITEURL.'orders.php');
		}


	}

?>