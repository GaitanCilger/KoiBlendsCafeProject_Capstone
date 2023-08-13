<?php include('partials/menu-head.php'); ?>

	<div class="menubgc"></div>

	<div class="menu">
		<?php

                //Get the searched word
                $search = $_POST['search'];

                ?>
		
		<div class="categories">
			<h1><?php echo $search; ?></h1>

			<div class="allc">
				<p>Products</p>
			</div>

		</div>

		<div class="milktea">

			<div class="section">

				<?php

                //Sql query to get coffee based on searched word
                $sql = "SELECT * FROM product WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

                //Execute query
                $res = mysqli_query($conn, $sql);

                //Count rows
                $count = mysqli_num_rows($res);

                //Check whether the searched item is available
                if($count > 0)
                {
                    //Coffee Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the details
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];
                        ?>

                        <a href="viewitem.php?id=<?php echo $id; ?>">
							<div class="p-box">
								
								<div class="items">
									<?php

	                                    //Check if image is present or not
	                                    if($image_name == "")
	                                    {
	                                        //Image not present
	                                        echo "Image Not Available";
	                                    }
	                                    else
	                                    {
	                                        //Image present
	                                        ?>

	                                        <img src="<?php echo SITEURL; ?>images/product/<?php echo $image_name; ?>">

	                                        <?php
	                                    }

	                                ?>

									<div class="itemdesc">
										<p><?php echo $title; ?></p>
										<h3>P <?php echo $price; ?></h3>
									</div>

									<div>
										<form method="POST" action="addtocart.php">
											<input type="hidden" name="product_name" value="<?php echo $title; ?>">
	                                        <input type="hidden" name="product_price" value="<?php echo $price; ?>">
	                                        <input type="hidden" name="product_image" value="<?php echo $image_name; ?>">
											<button class="card-btn" name="cartsub">Add to Cart</button>
										</form>
									</div>
								</div>

							</div>	
						</a>

                        <?php
                    }
                }
                else
                {
                    ?>
                    <h2>Product not available</h2>
                    <?php
                }

            ?>

		</div>

		<div class="clearfix"></div>

	</div>

<?php include('partials/front-foot.php'); ?>