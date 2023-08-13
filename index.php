<?php include('config/constants.php');  ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/home.php">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>

	<!-- fontawesome -->
     <link
     rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
   />
</head>
<body>

	<?php
			
			if(!isset($_SESSION['cart'])){
				$_SESSION['cart'] = array();
			}
		?>

	<div class="navigation">
		<?php
		//Query to get all categories from database
		$sql = "SELECT * FROM content WHERE id='1'";

		//Execute query
		$res = mysqli_query($conn, $sql);

		//Count the rows
		$count = mysqli_num_rows($res);

		if($count>0)
		{
			//Present in database
			//Get the data and display
			while($row=mysqli_fetch_assoc($res))
			{
				$image_name = $row['image_name'];

				?>
				<a href="index.php">
					<?php 
						//Check whether the image is available or not
						if($image_name!="")
						{
							//Display the image
							?>

							<img class="logo" src="<?php echo SITEURL; ?>images/content/<?php echo $image_name; ?>" width="251px" height="45px" >

							<?php
						}
				else
				{
					//Display the message
					echo "Image Not Added";
				}
			}
		}

		?>	
		</a>

		<ul>
			<li><a href="index.php">HOME</a></li>
			<li><a href="menu.php">MENU</a></li>
			<li><a href="aboutus.php">OUR STORY</a></li>
			<li><a href="faqs.php">FAQS</a></li>
		</ul>

		<div class="search">
			<form action="<?php echo SITEURL; ?>menu-search.php" method="POST">
				<input type="text" name="search" placeholder="Search" required>
				<input type="submit" name="submit" class="magnify">
			</form>
		</div>

		<div class="loginnav">
			<?php if(!isset($_SESSION['user'])) : ?>
			<a href="login.php" class="loginb">Login</a>
			<?php endif ?>
		</div>

		<div class="acc-cart">
			<?php if(isset($_SESSION['user'])) : ?>
			<div class="fall">
			  <button onclick="uNotif()" class="fallbtn"><img src="icons/bell2.png"><span id="bell"></button>
			  <div id="myF" class="fall-c">
			  	<a href="orders.php">View Order History</a>
			  	<?php

			  		$uid = $_SESSION['uid'];

				  	$notify1 = mysqli_query($conn, "SELECT * FROM m_order WHERE uid='$uid' AND notif2=0 ORDER BY id DESC LIMIT 2");
				  	if(mysqli_num_rows($notify1)>0)
				  	{
				  		
				  		while($get =mysqli_fetch_assoc($notify1))
				  		{
				  			
				  			?>
				  			
				  			<a href="vieworder.php?id=<?php echo $get['id']; ?>">
				  			<table>
				  				<tr>
				  					<td><?php echo $get['product'];?></td>
				  					<td>Status: <b><?php echo $get['status'];?></b></td>
				  				</tr>
				  			</table>
				  			</a>
				  			<?php
				  		}
				  	}
				  	else
				  	{
				  		
				  	}

				  	?>
			  </div>
			</div>
			<?php endif ?>

			<div class="dropdown">
			  <?php if(isset($_SESSION['user'])) : ?>
			  <img src="icons/user.png">
			  <?php endif ?>
			  <div class="dropdown-content">
			  	<?php if(isset($_SESSION['user'])) : ?>
			    <a href="profile-view.php"><?php echo $_SESSION['user']; ?></a>
			    <a href="logout.php">Logout</a>
			    <?php endif ?>
			  </div>
			</div>
			
	      	<?php if(isset($_SESSION['user'])) : ?>
	      	<a href="orders.php"><img src="icons/shopping-bag.png"></a>
	      	<?php endif ?>
			<a href="cart.php"><img src="icons/shopping-cart.png"><span>(<?php echo count($_SESSION['cart']); ?>)</span></a>
		</div>

	</div>

	<?php

		if(isset($_SESSION['userlog']))
	    {
	      echo '<div class="nmsg">
					<div class="notifmsg">
						<p>'.$_SESSION['userlog'].'</p>
					</div>
				</div>';
	      unset($_SESSION['userlog']);
	    }

	    if(isset($_SESSION['userout']))
	    {
	      echo '<div class="nmsg">
					<div class="notifmsg">
						<p>'.$_SESSION['userout'].'</p>
					</div>
				</div>';
	      unset($_SESSION['userout']);
	    }


	?>

	<div class="firstpanel">
		
		<div class="message">
			<?php
			//Query to get all categories from database
			$sql2 = "SELECT * FROM content WHERE id='2'";

			//Execute query
			$res2 = mysqli_query($conn, $sql2);

			//Count the rows
			$count1 = mysqli_num_rows($res2);

			if($count1>0)
			{
				//Present in database
				//Get the data and display
				while($row=mysqli_fetch_assoc($res2))
				{
					$mainmsg = $row['notice'];

					?>
						<h1><?php echo $mainmsg; ?></h1>
						<?php
					}
				}
			 ?>

			 <?php
			//Query to get all categories from database
			$sql3 = "SELECT * FROM content WHERE id='8'";

			//Execute query
			$res3 = mysqli_query($conn, $sql3);

			//Count the rows
			$count2 = mysqli_num_rows($res3);

			if($count2>0)
			{
				//Present in database
				//Get the data and display
				while($row=mysqli_fetch_assoc($res3))
				{
					$submsg = $row['notice'];

					?>
						<p><?php echo $submsg; ?></p>
						<?php
					}
				}
			 ?>
			
			<button class="order"><a href="menu.php">ORDER NOW</a></button>
			<button class="learn"><a href="aboutus.php">LEARN MORE</a></button>
		</div>

		<section id="slider">
		    <div class="container">
		        <div class="subcontainer">
		           <div class="refreshing_png">
		            <p>Refreshing</p>
		            <div class="heartHloder">
		                <img src="images/heartLogo.png" alt="">
		            </div>
		            
		           </div>
		           <div class="flavorful_png">
		            <div class="heartHloder">
		                <img src="images/heartLogo.png" alt="">
		            </div>
		            <p>Flavorful</p>
		           </div>
		            <div class="slider-wrapper">
		                <div>
		                </div>
		                <br>
		                <div class="my-slider">
		                        <!--Product-1-->
		                        <div>
		                            <div class="slide">
		                                <div class="RoundCover">
		                                    <div class="slider-img img-1">
		                                       <img src="images/imgscrollone.png">
		                                    </div>
		                               </div>
		                                <br>
		                            </div>
		                       </div>
		                        <!--Product-2-->
		                        <div>
		                            <div class="slide">
		                                <div class="slider-img img-2">
		                                    <img src="images/imgscrolltwo.png">
		                                </div>
		                                <br>
		                            </div>
		                        </div>
		                 </div>
		            </div>

		        </div>
		    </div>
		</section>

		<div class="clear"></div>

		<img class="splash2" src="svg/splash2.svg" width="538px" height="200px">

	</div>

	<div class="secondpanel">
		
		<div class="firstmessage">
			<h1>Why choose us?</h1>
		</div>

		<div class="first-info">
			<img src="svg/sustainable.svg">
			<p><b>Sustainable Living</b> <br> Koi Blends is a community for like-minded <br> individuals to come together and promote eco- <br> friendly living. Koi Blends wants to spread awareness <br> and create change by promoting small businesses <br> and showing people how we can make an impact.</p>

			<img src="svg/community.svg">
			<p><b>Community</b> <br> We believe that connecting with people is the key to <br> building a united community and that by working <br> together they can create positive change. We want <br> to be a space where those people can connect <br> emotionally.</p>
		</div>
	</div>

	<div class="thirdpanel">
		
		<div class="signature">
			<h1>Our Signature Tea</h1>
		</div>

		<div class="bestseller">
			<?php

			//Getting coffee that are active and featured
            $sql4 = "SELECT * FROM product WHERE signature='checked' AND active='Yes'";

            //Execute the query
            $res4 = mysqli_query($conn, $sql4);

            //Count rows
            $count3 = mysqli_num_rows($res4);

            //Check whether coffee available or not
            if($count3 > 0)
            {
                //Coffee present
                while($row2=mysqli_fetch_assoc($res4))
                {
                    //Get all the values
                    $id = $row2['id'];
                    $title = $row2['title'];
                    $price = $row2['price'];
                    $description = $row2['description'];
                    $image_name = $row2['image_name'];
                    ?>

			<img src="<?php echo SITEURL; ?>images/product/<?php echo $image_name; ?>">

			<div class="review">
				<h2><?php echo $title ?></h2>

				<h3>P <?php echo $price; ?></h3>

				<p><?php echo $description; ?></p>

				<form method="POST" action="addtocart.php">
					<input type="hidden" name="product_name" value="<?php echo $title; ?>">
                    <input type="hidden" name="product_price" value="<?php echo $price; ?>">
                    <input type="hidden" name="product_image" value="<?php echo $image_name; ?>">
				
					<button class="atc" name="cartsub">ADD TO CART</button>
					<button class="vm" name="viewmore">VIEW MORE</button>
				</form>
			</div>
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

		<div class="bsfoot"></div>

	</div>

	<div class="fourthpanel">
			<div class="fpmessage">
				<h1>What We Offer</h1>
				<p>At Koi Blends, we offer high-quality but affortable coffee and teas <br> that suits your taste bud.  Taste the greatness of happiness <br> together with your loved ones with us.</p>
			</div>

			<button class="pre-btn"><i class="fa-solid fa-angle-left"></i></button>
      		<button class="nxt-btn"><i class="fa-solid fa-angle-right"></i></button>

			<div class="product-container">

				<?php

	                //Getting coffee that are active and featured
	                $sql3 = "SELECT * FROM product LIMIT 8";

	                //Execute the query
	                $res3 = mysqli_query($conn, $sql3);

	                //Count rows
	                $count2 = mysqli_num_rows($res3);

	                //Check whether coffee available or not
	                if($count2 > 0)
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

	            <div class="product-card" id="p3">
	                <div class="product-image" id="img-3">
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
	                    <div>
							<form method="POST" action="addtocart.php">
								<input type="hidden" name="product_name" value="<?php echo $title; ?>">
                                <input type="hidden" name="product_price" value="<?php echo $price; ?>">
                                <input type="hidden" name="product_image" value="<?php echo $image_name; ?>">
								<button class="card-btn" name="cartsub">Add to Cart</button>
							</form>
						</div>
	                </div>
	                <div class="product-info">
	                    <h2 class="product-brand"><?php echo $title; ?></h2>
	                    <span class="price">P <?php echo $price; ?></span>
	                </div>
	            </div>
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

				<div class="fpfooter"></div>
				
			</div>

		</div>

		<script>
			const productContainers = [...document.querySelectorAll('.product-container')];
			const nxtBtn = [...document.querySelectorAll('.nxt-btn')];
			const preBtn = [...document.querySelectorAll('.pre-btn')];

			productContainers.forEach((item, i) => {
			    let containerDimensions = item.getBoundingClientRect();
			    let containerWidth = containerDimensions.width;

			    nxtBtn[i].addEventListener('click', () => {
			        item.scrollLeft += containerWidth;
			    })

			    preBtn[i].addEventListener('click', () => {
			        item.scrollLeft -= containerWidth;
			    })
			})
		</script>

		<?php if(!isset($_SESSION['user'])) : ?>
		<div class="news">
			<div class="newsmessage">
				<h1>Let's stay in touch!</h1>
				<p>Join our newsletter to get the latest news, updates, and special <br> offers directly in your inbox. Stay caffeinated everyone!</p>

				<div class="subs">
					<form method="POST" action="subscribe.php">
					<input type="text" name="email" placeholder="Your email address">
					<button class="subscribe" name="subscribe">SUBSCRIBE</button>
					</form>
				</div>

				<div class="icons">
					<img src="svg/mails.svg">
					<p>Koiblendsph</p>
				</div>
			</div>

			<div class="coffeemail">
				<img src="images/coffeemail.png" width="780px" height="440px">
			</div>

		</div>
		<?php endif ?>

		<div class="footer">
			
			<div class=links>
				<div class="fone">
					<img src="svg/blendsfooter.svg">

					<p>2421, Malasiqui Pangasinan, Philippines</p>
					<p>koiblendsph@gmail.com</p>
					<p>+63 909 120 0955</p>
				</div>

				<div class="ftwo">
					<h3>QUICK LINKS</h3>

					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="menu.php">Menu</a></li>
						<li><a href="aboutus.php">Our Story</a></li>
					</ul>
				</div>

			</div>

			<div class="line2"></div>

			<div class="copyright">
				<p>Copyright © Koi Blends 2022, based in Pangasinan, Philippines</p>
				<img src="svg/mails.svg" width="126px" height="44px">
			</div>

		</div>

		<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa-sharp fa-solid fa-angle-up" ></i></button>

		<script src="ouser.js"></script>
		
		<script>

			// button to Top
		let mybutton = document.getElementById("myBtn");

		// When the user scrolls down 20px from the top of the document, show the button
		window.onscroll = function() {scrollFunction()};

		function scrollFunction() {
		  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
		    mybutton.style.display = "block";
		  } else {
		    mybutton.style.display = "none";
		  }
		}

		// When the user clicks on the button, scroll to the top of the document
		function topFunction() {
		  document.body.scrollTop = 0;
		  document.documentElement.scrollTop = 0;
		}


		document.getElementById("burger").addEventListener("click", function(){
		    document.querySelector(".SmallScreen").style.display = "block";
		  })
	</script>

</body>
</html>