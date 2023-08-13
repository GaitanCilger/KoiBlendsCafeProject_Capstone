<?php

	include('config/constants.php'); 

	if(isset($_POST['resend']))
	{
		$id = $_POST['id'];

		if(isset($_FILES['image']['name']))
		{
			//Upload the image
			//To upload the image we need image name, source path destination path
			$image_name = $_FILES['image']['name'];

			//Upload the image only if image is selected
			if($image_name != "")
			{
				//Auto rename our image
				//Get the extension of our image (jpg, png, gif, etc)
				$ext = end(explode('.', $image_name));

				//Rename the image
				$image_name = "QR_".rand(000,999).'.'.$ext;

				$source_path = $_FILES['image']['tmp_name'];

				$destination_path = "uploads/".$image_name;

				//Upload the image
				$upload = move_uploaded_file($source_path, $destination_path);

				//Check if the image is uploaded
				if($upload==false)
				{
					//Set message
					$_SESSION['resendqr'] = "Failed to upload image";
					//Redirect to Add Category Page
					header('location:'.SITEURL.'orders.php');
					//Stop the process
					die();
				}
			}
		}
		else
		{
			//Don't upload the image and set the image_name value as blank
			$image_name = "";
		}

		$sql = "UPDATE m_order SET 
			gcash = '$image_name',
			status = 'Proof Update',
			notif = 0,
			notif2 = 0
			WHERE id = '$id';
		";

		$res = mysqli_query($conn, $sql);

		if($res==true)
		{
			$_SESSION['qr-update'] = "Update Complete";
			
			header('location:'.SITEURL.'orders.php');
		}
		else
		{
			$_SESSION['qr-update'] = "Failed to Update";
			
			header('location:'.SITEURL.'orders.php');
		}
	}

?>