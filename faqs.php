<?php include('partials/menu-head.php'); ?>
	<div class="bg-color-aufaqs">
	<div class="secondBgPhoto">
		
	</div>

	<div class="FAQSContainer">
		<h2>Frequently asked questions?</h2>
		<div class="Questions_Container">
			
			<p class="questions">
				Where is your store/shop located?
			</p>
	        <p class="answers">
	            Our shop is located at 2421, Malasiqui Pangasinan, Philippines
	        </p>
	        <br>

	        <div class="map">
	            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3837.177816162131!2d120.42349717983383!3d15.899752589039778!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3391455c78facb83%3A0x4106d00af3f2f200!2sKoi%20Blends!5e0!3m2!1sen!2sph!4v1666707447305!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
	        </div>
			<br>

			<?php
			//Query to get all categories from database
			$sql = "SELECT * FROM content WHERE id='13'";

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
						<p class="questions"><?php echo $mainmsg; ?></p>
						<?php
					}
				}
			 ?>

			 <?php
			//Query to get all categories from database
			$sql = "SELECT * FROM content WHERE id='14'";

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
						<p class="answers"><?php echo $mainmsg; ?></p>
						<?php
					}
				}
			 ?>
			<br>

	       <?php
			//Query to get all categories from database
			$sql = "SELECT * FROM content WHERE id='15'";

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
						<p class="questions"><?php echo $mainmsg; ?></p>
						<?php
					}
				}
			 ?>

			 <?php
			//Query to get all categories from database
			$sql = "SELECT * FROM content WHERE id='16'";

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
						<p class="answers"><?php echo $mainmsg; ?></p>
						<?php
					}
				}
			 ?>
			<br>

	        <?php
			//Query to get all categories from database
			$sql = "SELECT * FROM content WHERE id='17'";

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
						<p class="questions"><?php echo $mainmsg; ?></p>
						<?php
					}
				}
			 ?>

			 <?php
			//Query to get all categories from database
			$sql = "SELECT * FROM content WHERE id='18'";

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
						<p class="answers"><?php echo $mainmsg; ?></p>
						<?php
					}
				}
			 ?>
			<br>

	        <?php
			//Query to get all categories from database
			$sql = "SELECT * FROM content WHERE id='19'";

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
						<p class="questions"><?php echo $mainmsg; ?></p>
						<?php
					}
				}
			 ?>

			 <?php
			//Query to get all categories from database
			$sql = "SELECT * FROM content WHERE id='20'";

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
						<p class="answers"><?php echo $mainmsg; ?></p>
						<?php
					}
				}
			 ?>

		</div>
	</div>

	<div class="Contact_Container">
	    <h3>Contact Us</h3>
		<h4>For Collaborations, Partnerships, & Inquiries</h4>

		<div class="contact_info">
			<h5>You can contact us via:</h5>

			<div class="gmail">
			    <p class="label">Gmail: </p>
			    <p class="value"> koiblendsph@gmail.com</p>
			</div>
			<br>

			<div class="Contact_num">
			    <p class="label">Contact No: </p>
			    <p class="value"> +63 909 120 0955</p>
			</div>
			<br>

			<div class="address">
			    <p class="label">Address: </p>
			    <p class="value"> 2421, Malasiqui, Pangasinan, Philippines</p>
			</div>
		</div>
	</div>
	</div>

<?php include('partials/front-foot.php'); ?>