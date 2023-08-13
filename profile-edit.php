<?php include('partials/menu-head.php'); ?>

	<div class="profbgc">
		<div class="Profile_Container">

	        <div class="Profile_background"><img src="images/profilebg.png"></div>

	        <div class="User_Profile_Container">
	            <img class="User_Profile" src="images/UserProfile.png" alt="">
	        </div>

	        <?php
				//Get the Id of Selected Admin
				$id=$_GET['id'];

				//Create a query to get the details
				$sql ="SELECT * FROM verifusers WHERE id=$id";

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

						$fname = $rows['first_name'];
						$lname= $rows['last_name'];
						$username = $rows['username'];
						$address = $rows['address'];
						$password = $rows['password'];
						$email = $rows['email'];
						$contact = $rows['contact'];
					}
					else
					{
						header('location:'.SITEURL.'profile-view.php');
					}
				}
			?>

	        <div class="UserDetails_Container">
	            <p id="User_Name"><?php echo $username; ?></p>
	        </div>
	    </div>


	    <div class="profile-details">
	    	<form method="POST">
	    	<div class="pflname">
	    		<p>First Name</p>
	    		<p class="eplname">Last Name</p>
	    	</div>

	    	<div class="inflname">
	    		<input type="text" name="first_name" value="<?php echo $fname; ?>">
	    		<input class="inlname" type="text" name="last_name" value="<?php echo $lname; ?>">
	    	</div>

	    	<div class="pother-details">
	    		<p>Delivery Address</p>
	    		<input type="text" name="addressone" value="<?php echo $address; ?>">
	    		<p>Email</p>
	    		<input type="email" name="email_add" value="<?php echo $email; ?>">
	    		<p>Contact Number:</p>
	    		<input type="text" name="contact" value="<?php echo $contact; ?>">
	    		<p>Username</p>
	    		<input type="text" name="username" value="<?php echo $username; ?>">
	    		<p>Password</p>
	    		<input type="password" name="password" value="<?php echo $password; ?>">
	    	</div>

	    	<input type="hidden" name="id" value="<?php echo $id; ?>">
	    	<button name="save" type="submit" class="saveprof">Save Changes</button>

	    	</form>

	    	<?php

				//Check whether the submit button is clicked
				if(isset($_POST['save']))
				{
					
					$id = $_POST['id'];
					$first_name = $_POST['first_name'];
					$last_name = $_POST['last_name'];
					$addressone = $_POST['addressone'];
					$emailadd = $_POST['email_add'];
					$contact = $_POST['contact'];
					$username = $_POST['username'];
					$password = $_POST['password'];
					

					$cprof ="UPDATE verifusers SET
						first_name = '$first_name',
						last_name = '$last_name',
						address = '$addressone',
						email = '$emailadd',
						contact = '$contact',
						username = '$username',
						password = '$password'
						WHERE id = '$id'
					";

					$execute = mysqli_query($conn, $cprof);

					if($execute==true)
					{
						$_SESSION['profsaved'] = "Profile Saved";
						header('location:'.SITEURL.'profile-view.php');
					}
					else
					{
						$_SESSION['profsaved'] = "Failed to Change Profile";
						header('location:'.SITEURL.'profile-view.php');
					}

				}

			?>

	    </div>

	    <div class="profspc"></div>
    </div>

<?php include('partials/front-foot.php'); ?>