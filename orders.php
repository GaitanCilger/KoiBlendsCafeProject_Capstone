<?php include('partials/menu-head.php'); ?>

	<div class="cart">

		<?php

			if(isset($_SESSION['cancel-order']))
		    {
		      echo '<div class="nmsg">
		        <div class="notifmsg">
		          <p>'.$_SESSION['cancel-order'].'</p>
		        </div>
		      </div>';
		      unset($_SESSION['cancel-order']);
		    }

		    if(isset($_SESSION['qr-update']))
		    {
		      echo '<div class="nmsg">
		        <div class="notifmsg">
		          <p>'.$_SESSION['qr-update'].'</p>
		        </div>
		      </div>';
		      unset($_SESSION['qr-update']);
		    }

			?>
		
		<div class="cart-sidebar-module">

	      <div class="cart-header-padding">
	        <div class="cart-header">
	          <p>
	            <span class="title">Order History</span>
	          </p>
	        </div>

      </div>

      <div class="cart-products">
      	
      	<div class="m-atwo">
      	<table>
      		<tr>
      			<th>Order</th>
      			<th>Products</th>
      			<th>Total</th>
      			<th>Method</th>
      			<th>Status</th>
      			<th colspan="2"></th>
      		</tr>

      		<?php

      		$uid = $_SESSION['uid'];

			$sql = "SELECT * FROM m_order WHERE uid ='$uid' ORDER BY id DESC";
			$res = mysqli_query($conn, $sql);


			if($res==true)
			{
				//Count rows to check whether it is save database
				$count = mysqli_num_rows($res);
				$sn = 1; //Create a variable


				//Check the number of rows
				if($count>0)
				{
					//We have in database
					while($rows=mysqli_fetch_assoc($res))
					{
						$id=$rows['id'];
						$product=$rows['product'];
						$method=$rows['method'];
						$total=$rows['total'];
						$status =$rows['status'];

						//Display the values to the table
						?>

						<tr>
							<td><?php echo $sn++; ?></td>
							<td><?php echo $product; ?></td>
							<td><?php echo $total; ?></td>
							<td><?php echo $method; ?></td>
							<td><?php echo $status; ?></td>
							<td><a href="<?php echo SITEURL; ?>vieworder.php?id=<?php echo $id; ?>"><button class="cancelbtn">View</button></a></td>
							<?php if($rows["status"] != 'Cancelled' && $rows["status"] !='Preparing' && $rows["status"] !='On Delivery' && $rows["status"] !='Delivered'){ ?>
							<td><a href="<?php echo SITEURL; ?>cancel-order.php?id=<?php echo $id; ?>"><button class="cancelbtn">Cancel</button></a></td>
							<?php }?>
						</tr>

						<?php
					}
				}
				else
				{
					//We do not have in database
				}
			}

			?>

      	</table>
      	</div>

      </div>

	</div>

<?php include('partials/front-foot.php'); ?>