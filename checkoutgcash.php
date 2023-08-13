<?php include('partials/menu-head.php'); ?>



<?php include('partials/front-foot.php'); ?>

<div class='gcash-m'>
	<div class='gcash-mc'>
		<div class=''>
			<img class='gcashqr' src='images/qr.jpg'>
		</div>

		<p class="providetransac">Please Provide a Screenshot of your Transaction</p>

		<form method='POST' enctype='multipart/form-data'>

		<div class="gcashtotal">
			<p class="tpayment">Total Payment:</p> 
			<p id="gtotal" class="ggtotal"></p>
		</div>

		<?php

      		if(isset($_SESSION['cart']))
      		{
	      		foreach($_SESSION['cart'] as $key => $value)
	      		{
			
				?>

	            <input type="hidden" class="iprice" value="<?php echo$value['Price'] ?>">
	            <input type="hidden" class="iqty" value="<?php echo$value['Qty']; ?>">
	            <input type="hidden" class="itotal" value="<?php echo$value['Price'] ?>"> 
				<?php
		      }
	      		}

	      		?>

		<?php

	        $cid =$_SESSION['uid'];

					$sql = "SELECT * FROM verifusers where id = $cid";
					$result = mysqli_query($conn, $sql);
					$row = mysqli_fetch_assoc($result);


	        ?>
			
			<input type="hidden" name="fname" value="<?php echo $row['first_name']; ?>">
	        <input type="hidden" name="lname" value="<?php echo $row['last_name']; ?>">
	        <input type="hidden" name="uaddress" value="<?php echo $row['address']; ?>">
	        <input type="hidden" name="number" value="<?php echo $row['contact']; ?>">
	        <input type="hidden" name="email" value="<?php echo $row['email']; ?>">

			<input type='file' name='image' class='uploadproof' required>
			<input type='submit' name='submit' value='Upload' class='btnUpload'>
		</form>
	</div>

	<script>
      		
      	var peso = "P";	
      	var gt=0;
	    	var iprice = document.getElementsByClassName('iprice');
	    	var iqty = document.getElementsByClassName('iqty');
	    	var itotal = document.getElementsByClassName('itotal');
	    	var gtotal = document.getElementById('gtotal');

	    	function subTotal()
	    	{
	    		gt=0;
	    		for(i=0; i<iprice.length; i++)
	    		{
	    			itotal[i].innerText=peso+(iprice[i].value)*(iqty[i].value);

	    			gt = gt+(iprice[i].value)*(iqty[i].value);
	    		}
	    		gtotal.innerText=peso + gt;
	    	}

	    	subTotal()

      </script>
</div>

<?php

	if(isset($_POST['submit']))
	{
		$status = 'Ordered';
		$date = date("Y-m-d h:i:sa");

		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$number = $_POST['number'];
		$email = $_POST['email'];
		$method = 'GCash';
		$address = $_POST['uaddress'];

		$uid = $_SESSION['uid'];

		if(isset($_FILES['image']['name']))
		{
			//Upload the image
			//To upload the image we need image name, source path destination path
			$image_name = $_FILES['image']['name'];

			//Upload the image only if image is selected
			if($image_name != "")
			{
				//Auto rename our image
				//Get the extension of our image (jpg, png, gif, etc)
				$ext = end(explode('.', $image_name));

				//Rename the image
				$image_name = "QR_".rand(000,999).'.'.$ext;

				$source_path = $_FILES['image']['tmp_name'];

				$destination_path = "uploads/".$image_name;

				//Upload the image
				$upload = move_uploaded_file($source_path, $destination_path);

				//Check if the image is uploaded
				if($upload==false)
				{
					//Set message
					$_SESSION['qr'] = "Failed to upload image";
					//Redirect to Add Category Page
					header('location:'.SITEURL.'checkout.php');
					//Stop the process
					die();
				}
			}
		}
		else
		{
			//Don't upload the image and set the image_name value as blank
			$image_name = "";
		}

		if ($_SESSION['cart'] > 0) {
			$price_total = 0;
			foreach ($_SESSION['cart'] as $key => $value) {
				$products[] = $value['Item'] . ' (' . $value['Qty'] . ' )';

				$product_price = ((int)($value['Price'] * $value['Qty']));

				$price_total += $product_price;
			}

			$qty = array_column($_SESSION['cart'], 'Qty');
			$tqty = array_sum($qty);

			$total_product = implode(',', $products);

			$place = "INSERT INTO m_order SET
		    		uid = '$uid',
		    		product = '$total_product',
		    		price = '$price_total',
		    		qty = '$tqty',
		    		total = '$price_total',
		    		method = '$method',
		    		gcash = '$image_name',
		    		order_date = '$date',
		    		status = '$status',
		    		user_fname = '$fname',
		    		user_lname = '$lname',
		    		user_contact = '$number',
		    		user_email = '$email',
		    		user_address = '$address'
		    	";

		$oplaced = mysqli_query($conn, $place) or die(mysqli_error());

			echo "<div class='o-m-c'>

			    <div class='m-c'>

			        <h3>Thank you for Shopping!</h3>

			        <div class='o-d'>

			            <span>" . $total_product . "</span>
			            <br>
			            <span class='totalp'> Total : P" . $price_total . "  </span>

			        </div>

			        <div class='c-d'>

			            <p>Name: <span>" . $fname . " " . $lname . "</span> </p>
			            <p>Number: <span>" . $number . "</span> </p>
			            <p>Email: <span>" . $email . "</span> </p>
			            <p>Address: <span>" . $address . "</span> </p>
			            <p>Method: <span>" . $method . "</span> </p>

			        </div>

			        <a href='menu.php'><button class='btnOption'>OK</button></a>

			    </div>";

		unset($_SESSION['cart']);
	}
}

?>