<?php include('partials/menu-head.php'); ?>

	<div class="cart">
		
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
      			<th></th>
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
							<td><a href="#"><button class="cancelbtn">Cancel</button></a></td>
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

	<div class="cancel-modal">
		<div class="cancel-c">

			<?php
				//Get the Id of Selected Admin
				$id=$_GET['id'];

				//Create a query to get the details
				$sql ="SELECT * FROM m_order WHERE id=$id";

				//Execute the query
				$res =mysqli_query($conn, $sql);

				//Check if the query is executed or not
				if($res==true)
				{
					$count = mysqli_num_rows($res);

					if($count==1)
					{
						//echo "Admin Available";
						$rows =mysqli_fetch_assoc($res);

						$user_fname = $rows['user_fname'];
						$user_lname = $rows['user_lname'];
						$product = $rows['product'];
						$total = $rows['total'];
						$method = $rows['method'];
						$date = $rows['order_date'];
					}
					else
					{
						header('location:'.SITEURL.'orders.php');
					}
				}
			?>
			
			<div class="cancel-box">
				<h1>Cancel this order?</h1>

				<form method="POST" action="confirm-cancel.php">
				<table>
					<tr>
						<td>Name:</td>
						<td><?php echo $user_fname; ?> <?php echo $user_lname; ?></td>
					</tr>

					<tr>
						<td>Product:</td>
						<td><?php echo $product; ?></td>
					</tr>

					<tr>
						<td>Total:</td>
						<td><?php echo $total; ?></td>
					</tr>

					<tr>
						<td>Method</td>
						<td><?php echo $method; ?></td>
					</tr>

					<tr>
						<td>Date:</td>
						<td><?php echo $date; ?></td>
					</tr>

					<tr>
						<th colspan="2">Remarks</th>
					</tr>

					<tr>
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<td colspan="2"><textarea name="remarks"></textarea></td>
					</tr>

				</table>

				<button class="cobtn" name="cancel">Yes</button>
				<button class="cobtn" name="cno">No</button>

				</form>
			</div>

		</div>
	</div>