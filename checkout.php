<?php include('partials/menu-head.php'); ?>

	<div class="checkout">
		
		<div class="checkout-module">
		  <form method="POST" enctype="multipart/form-data">
		  <div class="checkout-module-container">
		          <!-- header -->
		          <div class="checkout-header-padding">

		            <div class="checkout-header">
		            	<a href="cart.php"id="back-btn">
	                      <i class="fa-solid fa-arrow-left fa-2xl"></i>
		            	</a>
		                  
		                  <p>
		                  <span class="backToCart">Checkout</span>
		                  </p>
		            </div>
		          </div>
		           <?php
		        if(isset($_SESSION['cart'])&& count($_SESSION['cart'])>0)
		        {
		        ?>

		        <div class="checkOutItem">
								<?php

			      		if(isset($_SESSION['cart']))
			      		{
				      		foreach($_SESSION['cart'] as $key => $value)
				      		{
	      			
	      				?>
		        	
                  <div class="checkOutBox">
                  	
                	<img src="images/product/<?php echo$value['Image']; ?>" class="product-image">

					          <div class="product-dtails">
					              <p class="product-name"><?php echo $value['Item']; ?></p>
					              <input type="hidden" class="iprice" value="<?php echo$value['Price'] ?>">
					              <input type="hidden" class="iqty" value="<?php echo$value['Qty']; ?>">
					              <p class="itemPrice itotal">P <?php echo$value['Price'] ?></p>
					          </div>

			         		  <span class="product-quantity">x <?php echo$value['Qty']; ?></span>
                  </div>

		          <?php
		      }
	      		}

	      		?>
		        </div>
		       
		       
	          <div class="customer-details">

		        <?php

		        $cid =$_SESSION['uid'];

						$sql = "SELECT * FROM verifusers where id = $cid";
						$result = mysqli_query($conn, $sql);
						$row = mysqli_fetch_assoc($result);


		        ?>

	            <p class="fill-up-label">Billing Information</p>

	            <div class="udetails">
	            	<div class="uborder">
		                <div class="fnameLname-holder">
		                    <p class="first-name">Name:</p>
		                    <p class="last-name"><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?></p>
		                </div>

		                <div class="addressholder">
		                	<p>Address:</p>
		                	<p class="last-name"> <?php echo $row['address']; ?></p>
		                </div>

		                <div class="addressholder">
		                	<p>Email:</p>
		                	<p class="last-name"><?php echo $row['email']; ?></p>
		                </div>

		                <div class="addressholder">
		                	<p>Contact No: </p>
		                	<p class="last-name"><?php echo $row['contact']; ?></p>
		                </div>
			          </div>
		          </div>
	          </div>

            
            <div class="Payment-details">
                <p class="payment-details-label">Payment Details:</p>
                <table>
                  <tr>
                    <td>Payment Method:</td>
                    <td class="amount">
                    	<select name="method">
	                        <option value="Cash on Delivery">Cash on Delivery</option>
	                        <option value="GCash">GCash</option>
                    	</select>
                    </td>
                  </tr>
                </table>
            </div>
                
                <?php
		        }else{
		        	echo "<div class='displayOrder'><span>Your Cart Is Empty</span></div>";
		        }
		        ?>

		            
		      <div class="checkout-footer">
		        <div class="total-checkout">
		          <p>Total Payment:</p>
		          <p id="gtotal"></p>
		        </div>
		        <input type="hidden" name="fname" value="<?php echo $row['first_name']; ?>">
		        <input type="hidden" name="lname" value="<?php echo $row['last_name']; ?>">
		        <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
		        <input type="hidden" name="uaddress" value="<?php echo $row['address']; ?>">
		        <input type="hidden" name="number" value="<?php echo $row['contact']; ?>">
		        <button type="submit" name="order" class="place-order-link">Place Order</button>
		      </div>    

		     </div>
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

<?php include('partials/front-foot.php'); ?>

<?php

	if(isset($_POST['order']))
	{
		$status = 'Ordered';
		$date = date("Y-m-d h:i:sa");

		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$number = $_POST['number'];
		$email = $_POST['email'];
		$method = $_POST['method'];
		$address = $_POST['uaddress'];

		$uid = $_SESSION['uid'];

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
		    		order_date = '$date',
		    		status = '$status',
		    		user_fname = '$fname',
		    		user_lname = '$lname',
		    		user_contact = '$number',
		    		user_email = '$email',
		    		user_address = '$address'
		    	";

    if($tqty > 10)
    {
    	echo "<script>
					alert('We cannot accept bulk orders');
					</script>";
    }
		elseif($number == "" || $address == "")
		{
			echo "<script>
					alert('Please complete your profile before placing an order');
					</script>";
		}elseif($method == "GCash")
		{

			echo "<script>
					window.location.href='checkoutgcash.php';
					</script>";
		}
		else
		{
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

}


?>