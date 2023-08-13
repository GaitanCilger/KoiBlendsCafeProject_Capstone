<?php

	include('config/constants.php');

	if($_SERVER["REQUEST_METHOD"]=="POST")
	{

		if(isset($_POST['cqty']))
		{
			foreach($_SESSION['cart'] as $key => $value)
			{
				if($value['Item']==$_POST['item'])
				{
					$_SESSION['cart'][$key]['Qty']=$_POST['cqty'];
					echo "<script>
					window.location.href='cart.php';
					</script>";
				}
			}
		}

	}

?>