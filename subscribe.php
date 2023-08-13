<?php

	include('config/constants.php');

	use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';

    if(isset($_POST['subscribe']))
    {
    	$email = $_POST['email'];

    	$check_query = mysqli_query($conn, "SELECT * FROM emailsubs where email ='$email'");
      	$rowCount = mysqli_num_rows($check_query);

      	if(!empty($email)) {
	        if ($rowCount > 0) {
	          ?>
	          <script>
	            alert("Email already subscribed");
	            window.location.replace('index.php');
	          </script>
	          <?php
	        }else{

				$mail = new PHPMailer(true);
				//Enable verbose debug output
				$mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;

				//Send using SMTP
				$mail->isSMTP();

				//Set the SMTP server to send through
				$mail->Host = 'smtp.gmail.com';

				//Enable SMTP authentication
				$mail->SMTPAuth = true;

				//SMTP username
				$mail->Username = 'gklien8@gmail.com';

				//SMTP password
				$mail->Password = 'iheqzpygumzsyydm';

				//Enable TLS encryption;
				$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

				//TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
				$mail->Port = 587;

				//Recipients
				$mail->setFrom('gklien8@gmail.com', 'Koi Blends');

				//Add a recipient
				$mail->addAddress($email, $name);

				//Set email format to HTML
				$mail->isHTML(true);

				$mail->Subject = 'Email verification';
				$mail->Body    = '<h1 style="color: #D8973C;">Welcome to Koiblends family</h1>

				<p>Thank you for signing up to receive our emails. We look forward to keeping you <br>
				   informed of new products, special events, and promotions for Koi Blends</p>
				<p>	</p>

				<p>You will also receive special offers from selected Koi Blends partners. We also <br>
					love to get your feedback on how we can improve our products and services, so <br>
					do not be shy :)</p>

				<p>See you around!</p>

				<p>Cheers,</p>

				<p style="font-size: 20px; color: #D8973C;">Koiblends</p>';

				// insert in users table
				$sql = "INSERT INTO emailsubs SET
				email='$email'
				";

				mysqli_query($conn, $sql);

				if(!$mail->send()){
				  ?>
				      <script>
				          alert("<?php echo "Register Failed, Invalid Email "?>");
				          window.location.replace('index.php');
				      </script>
				  <?php
				}else{
				  ?>
				  <script>
				      alert("<?php echo "An email has been sent to " . $email ?>");
				      window.location.replace('index.php');
				  </script>
				  <?php
				}


	        }
	    }
    }

?>