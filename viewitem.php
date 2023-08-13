<?php include('partials/menu-head.php'); ?>

	<?php

    if(isset($_SESSION['additem']))
    {
      echo '<div class="nmsg">
        <div class="notifmsg">
          <p>'.$_SESSION['additem'].'</p>
        </div>
      </div>';
      unset($_SESSION['additem']);
    }

    if(isset($_SESSION['incart']))
    {
      echo '<div class="nmsg">
        <div class="notifmsg">
          <p>'.$_SESSION['incart'].'</p>
        </div>
      </div>';
      unset($_SESSION['incart']);
    }


    ?>
	<div class="menubgc"></div>

	<div class="menu">
		
		<div class="categories">
			<h1>Our Menu</h1>

			<div class="series-dropdown">
				<div class="allc">
					<p>Choose a category</p>
				</div>
				<div class="series-content">
					<?php 

		                //Create sql to diplay categories from database
		                $sql = "SELECT * FROM category";

		                //Execute the query
		                $res = mysqli_query($conn, $sql);

		                //Count rows to check whether the category is available or not
		                $count = mysqli_num_rows($res);

		                if($count > 0)
		                {
		                    //Category present
		                    while($row=mysqli_fetch_assoc($res))
		                    {
		                        //Get the values like id, title and image_name
		                        $id = $row['id'];
		                        $title = $row['title'];

		                        ?>
		                        <a href="<?php echo SITEURL; ?>by-category.php?category_id=<?php echo $id; ?>">
									<p><?php echo $title; ?></p>	
								</a>

		                        <?php
		                    }
		                }
		                else
		                {
		                    //Category unavailable
		                    echo "Category Not Added";
		                }

		            ?>
				</div>
			</div>
		</div>

		<div class="milktea">
			<div class="mtmsg"><h1>Milk Tea Series</h1></div>

			<div class="section">

				<?php

                //Getting coffee that are active and featured
                $sql2 = "SELECT * FROM product WHERE category_id='1' AND active='Yes'";

                //Execute the query
                $res2 = mysqli_query($conn, $sql2);

                //Count rows
                $count2 = mysqli_num_rows($res2);

                //Check whether coffee available or not
                if($count2 > 0)
                {
                    //Coffee present
                    while($row2=mysqli_fetch_assoc($res2))
                    {
                        //Get all the values
                        $id = $row2['id'];
                        $title = $row2['title'];
                        $price = $row2['price'];
                        $description = $row2['description'];
                        $image_name = $row2['image_name'];
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
											<h3>&#8369; <?php echo $price; ?></h3>
										</div>

										<div>
											<form method="POST" action="addtocart.php">
												<input type="hidden" name="product_name" value="<?php echo $title; ?>">
	                                            <input type="hidden" name="product_price" value="<?php echo $price; ?>">
	                                            <input type="hidden" name="product_image" value="<?php echo $image_name; ?>">
												<button type="submit" class="card-btn" name="cartsub">Add to Cart</button>
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
                    //Coffee unavailable
                    echo "Product Not Available";
                }

            ?>

		</div>

		<div class="clearfix"></div>

		<div class="milktea">
			<div class="mtmsg"><h1>Coffee Series</h1></div>

			<div class="section">

				<?php

                //Getting coffee that are active and featured
                $sql3 = "SELECT * FROM product WHERE category_id='7' AND active='Yes'";

                //Execute the query
                $res3 = mysqli_query($conn, $sql3);

                //Count rows
                $count3 = mysqli_num_rows($res3);

                //Check whether coffee available or not
                if($count3 > 0)
                {
                    //Coffee present
                    while($row3=mysqli_fetch_assoc($res3))
                    {
                        //Get all the values
                        $id = $row3['id'];
                        $title = $row3['title'];
                        $price = $row3['price'];
                        $description = $row3['description'];
                        $image_name = $row3['image_name'];
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
										<h3>&#8369; <?php echo $price; ?></h3>
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
                    //Coffee unavailable
                    echo "Product Not Available";
                }

            ?>

			</div>
			
		</div>

		<div class="clearfix"></div>

		<div class="milktea">
			<div class="mtmsg"><h1>Delicasies and Snack Series</h1></div>

			<div class="section">
				<?php

                //Getting coffee that are active and featured
                $sql4 = "SELECT * FROM product WHERE category_id='8' AND active='Yes'";

                //Execute the query
                $res4 = mysqli_query($conn, $sql4);

                //Count rows
                $count4 = mysqli_num_rows($res4);

                //Check whether coffee available or not
                if($count4 > 0)
                {
                    //Coffee present
                    while($row4=mysqli_fetch_assoc($res4))
                    {
                        //Get all the values
                        $id = $row4['id'];
                        $title = $row4['title'];
                        $price = $row4['price'];
                        $description = $row4['description'];
                        $image_name = $row4['image_name'];
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
										<h3>&#8369; <?php echo $price; ?></h3>
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
                    //Coffee unavailable
                    echo "Product Not Available";
                }

            ?>
			 	
			</div>
			
		</div>

		<div class="clearfix"></div>

	</div>

<?php include('partials/front-foot.php'); ?>

	<?php
		
		$id = $_GET['id'];

		//Create a query to get the details
		$sql ="SELECT * FROM product WHERE id=$id";

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

				$id = $rows['id'];
                $title = $rows['title'];
                $price = $rows['price'];
                $description = $rows['description'];
                $image_name = $rows['image_name'];
			}
			else
			{
				header('location:'.SITEURL.'menu.php');
			}
		}
	?>

	<div class="prodmodal">
        <div class="prod-c">
        	<div class="img-prodbox">
		        <div class="img-prod">
		            <img src="images/product/<?php echo $image_name; ?>">
		        </div>
	        </div>
        <div class="details-prod">
            <p class="name-prod"><?php echo $title;; ?></p>
            <p class="desc-prod"><?php echo $description; ?></p>
        </div>
        <div class="button-prod">
        	<form method="POST" action="addtocart.php">
	        	<input type="hidden" name="product_name" value="<?php echo $title; ?>">
	            <input type="hidden" name="product_price" value="<?php echo $price; ?>">
	            <input type="hidden" name="product_image" value="<?php echo $image_name; ?>">
	            <button type="submit" name="cartsub">Add to Cart (&#8369; <?php echo $price; ?>)</button>
            </form>
        </div>
    </div>
    </div>

    