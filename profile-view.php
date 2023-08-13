<?php include('partials/menu-head.php'); ?>

	<div class="profbgc">

		<div class="Profile_Container">

			<?php

			if(isset($_SESSION['profsaved']))
		    {
		      echo '<div class="nmsg">
		        <div class="notifmsg">
		          <p>'.$_SESSION['profsaved'].'</p>
		        </div>
		      </div>';
		      unset($_SESSION['profsaved']);
		    }

			?>
	        <div class="Profile_background"><img src="images/profilebg.png"></div>

	        <div class="User_Profile_Container">
	            <img class="User_Profile" src="images/UserProfile.png" alt="">
	        </div>

	        <?php

	        	$cid =$_SESSION['uid'];

				$sql = "SELECT * FROM verifusers where id = $cid";
				$result = mysqli_query($conn, $sql);
				$row = mysqli_fetch_assoc($result);


	        ?>

	        <div class="UserDetails_Container">
	            <p id="User_Name"><?php echo $row['username']; ?></p>
	            <a href="profile-edit.php?id=<?php echo $row['id']; ?>"><button class="editprof">Edit</button></a> 
	        </div>
	    </div>


	    <div class="profile-details">
	    	
	    	<div class="pflname">
	    		<p>First Name: <b><?php echo $row['first_name']; ?></b></p>
	    		<p class="plname">Last Name: <b><?php echo $row['last_name']; ?></b></p>
	    	</div>

	    	<div class="pother-details">
	    		<p>Delivery Address : <b><?php echo $row['address']; ?></b></p>
	    		<p>Email: <b><?php echo $row['email']; ?></b></p>
	    		<p>Contact: <b><?php echo $row['contact']; ?></b></p>
	    		<p>Username: <b><?php echo $row['username']; ?></b></p>
	    	</div>
	    </div>

	    <div class="profspc"></div>
    </div>

<?php include('partials/front-foot.php'); ?>