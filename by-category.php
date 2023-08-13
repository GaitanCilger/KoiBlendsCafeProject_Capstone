<?php include('partials/menu-head.php'); ?>

	<div class="menubgc"></div>

	<?php

    //Check if id is passed or not
    if(isset($_GET['category_id']))
    {
        //Category id is set
        $category_id = $_GET['category_id'];

        //Get the category title based on id
        $sql = "SELECT title FROM category WHERE id=$category_id";

        //Execute the query
        $res = mysqli_query($conn, $sql);

        //Get the value from database
        $row = mysqli_fetch_assoc($res);

        //Get the title
        $category_title = $row['title'];

    }
    else
    {
        //Category not passed
        //Redirect to menu page
        header('location:'.SITEURL.'menu.php');
    }

?>


	<div class="menu">
		
		<div class="categories">
			<h1><?php echo $category_title; ?></h1>

			<div class="allc">
				<p>Products</p>
			</div>

		</div>

		<div class="milktea">

			<div class="section">

				<?php

				//Create query to get items based on selected category
                $sql2 = "SELECT * FROM product WHERE category_id=$category_id";

                //Execute query
                $res2 = mysqli_query($conn, $sql2);

                //Count the rows
                $count2 = mysqli_num_rows($res2);

                //Check whether item is available or not
                if($count2>0)
                {
                    //Item available
                    while($row2=mysqli_fetch_assoc($res2))
                    {
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
                    //Coffee unavailable
                    echo "Product Not Available";
                }

            ?>

		</div>

		<div class="clearfix"></div>

	</div>

<?php include('partials/front-foot.php'); ?>