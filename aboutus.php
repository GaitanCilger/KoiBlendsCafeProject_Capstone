<?php include('partials/menu-head.php'); ?>
	
	<div class="bg-color-aufaqs">
	<div class="firstBgPhoto">
		<div class="message">
			<?php
			//Query to get all categories from database
			$sql = "SELECT * FROM content WHERE id='10'";

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
					$mainmsg = $row['notice'];

					?>
						<h1><?php echo $mainmsg; ?></h1>
						<?php
					}
				}
			 ?>
			<p>- Koi Blends Cafe</p>

		</div>
		
	</div>

<div class="OurStoryContainer">
	<h2>Our Story</h2>
	<div class="OurStoryLblContainer">
		
		<h3>All about our brand</h3>
		<br>
		<p>
			Koi Blends started as a small business around Pangasinan. Mera De Vera, the founder of Koi Blends Cafe started Koi Blends out of passion and love for coffee and milk tea. 

		</p>
		<br>
		<p>
			As she was a coffee lover and also an advocate for sustainable living, she got inspired to start her own business with a mission to make a change.
		</p>
		<br>
		<p>
			Koi Blends is a cafe selling refreshing coffee, milk tea, and flavorful snacks. Koi Blends are committed to providing affordable yet high-quality drinks and snacks by selecting only the finest ingredients to satisfy your hunger.

		</p>
		<br>
		<p>
			Koi Blends promotes an eco-friendly lifestyle that helps the community and the environment create a change. Koi Blends wants the individuals to unite and be part of the change.
		</p>

	</div>

	<div class="secondpanel">
		
		
	</div>

	<div class="OurMissionLblContainer">
		<h3>Our Mission</h3>
		<br>

		<?php
			//Query to get all categories from database
			$sql1 = "SELECT * FROM content WHERE id='11'";

			//Execute query
			$res1 = mysqli_query($conn, $sql1);

			//Count the rows
			$count1 = mysqli_num_rows($res1);

			if($count1>0)
			{
				//Present in database
				//Get the data and display
				while($row=mysqli_fetch_assoc($res1))
				{
					$mainmsg = $row['notice'];

					?>
						<p><?php echo $mainmsg; ?></p>
						<?php
					}
				}
			 ?>

	</div>

	<div class="thirdpanel">
		
			
	</div>

	<div class="OurVisionLblContainer">
		<h3>Our Vision</h3>
		<br>

		<?php
			//Query to get all categories from database
			$sql2 = "SELECT * FROM content WHERE id='12'";

			//Execute query
			$res2 = mysqli_query($conn, $sql2);

			//Count the rows
			$count2 = mysqli_num_rows($res2);

			if($count2>0)
			{
				//Present in database
				//Get the data and display
				while($row=mysqli_fetch_assoc($res2))
				{
					$mainmsg = $row['notice'];

					?>
						<p><?php echo $mainmsg; ?></p>
						<?php
					}
				}
			 ?>

	</div>

	<div class="fourthpanel">
			
	</div>
	</div>

<?php include('partials/front-foot.php'); ?>