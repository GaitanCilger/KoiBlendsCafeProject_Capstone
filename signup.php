<?php include('config/constants.php');  ?>

<!Doctype html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/signup.php" media="all">
  <title>Account Registration</title>
  <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap"
      rel="stylesheet"
    />
     <!-- fontawesome -->
     <link
     rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
   />
</head>

<body>

  <?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';

 
    if (isset($_POST["submit"]))
    {
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $address = $_POST['address'];
      $email = $_POST['email'];
      $contact = $_POST['contact'];
      $username = $_POST['username'];
      $password = $_POST['password'];

      $check_query = mysqli_query($conn, "SELECT * FROM verifusers where email ='$email' OR username = '$username'");
      $rowCount = mysqli_num_rows($check_query);



      if(!preg_match("/^[a-zA-Z\s]+$/", $first_name) || !preg_match("/^[a-zA-Z\s]+$/", $last_name))
        {
          ?>
          <script>
            alert("Please enter character only");
          </script>
          <?php
        }elseif(!preg_match("/^[0-9]*$/", $contact))
        {
          ?>
          <script>
            alert("Please enter valid mobile number");
          </script>
          <?php
        }elseif(strlen($contact)<11)
        {
          ?>
          <script>
            alert("Please enter proper number");
          </script>
          <?php
        }elseif(strlen($contact)>11)
        {
          ?>
          <script>
            alert("Number is too large. Enter a valid number");
          </script>
          <?php
        }elseif(strlen($password)<8)
        {
          ?>
          <script>
            alert("Password should be at least 8 characters");
          </script>
          <?php
        }elseif(strlen($password)>20)
        {
          ?>
          <script>
            alert("Password too long");
          </script>
          <?php
        }elseif(!empty($email) || !empty($username)) {
        if ($rowCount > 0) {
          ?>
          <script>
            alert("Email or Username already exist");
          </script>
          <?php
        }else{
          //Instantiation and passing `true` enables exceptions
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

          $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
          $_SESSION['vc'] = $verification_code;
          $_SESSION['mail'] = $email;

          $mail->Subject = 'Email verification';
          $mail->Body    = '<h1 style="color: #D8973C;">Welcome to Koiblends</h1>

          <p>We are so happy and excited to have you here. Thank you for signing up and making a connection with <br>
               us. To get started, please use the provided code below to confirm your new account.</p>
          <p>CODE: <b style="font-size: 25px;">'.$verification_code.'</b></p>

          <p>If you have any questions, please contact us and notify us about your concern.</p>
          <p>And, follow us on our social media to always get notified!</p>

          <p>Best,</p>

          <p style="font-size: 20px; color: #D8973C;">Koiblends</p>';

          // insert in users table
          $sql = "INSERT INTO verifusers SET
          first_name='$first_name',
          last_name='$last_name',
          address='$address',
          email='$email',
          contact='$contact',
          username='$username',
          password='$password',
          verification_code='$verification_code',
          email_verif_at='NULL',
          status = 0
        ";
          mysqli_query($conn, $sql);

          if(!$mail->send()){
              ?>
                  <script>
                      alert("<?php echo "Register Failed, Invalid Email "?>");
                      window.location.replace('signup.php');
                  </script>
              <?php
          }else{
              ?>
              <script>
                  alert("<?php echo "Register Successfully, A verification code is sent to " . $email ?>");
                  window.location.replace('email-verif.php');
              </script>
              <?php
          }
        }
      }
    }
?>

 <div class="container">
  
            <div class="column-1">
              <a href="index.php">
                <div class="backgroundContainer">
                  <img class="bgDisplay" viewBox="0 0 24 24" src="svg/KoiBlendsTitle.svg" alt="bg">
                </div>
              </a>
            </div>
            
            <div class="column-2">
            <div class="wrapper">
              <div class="title"><span>Create Account</span></div>
              <p>Enter your details to create your own account.</p>

              <form method="POST">
                <div class="row">
                <input type="text" placeholder="First Name" name="first_name" required>
                </div>
                <br>
                <div class="row">
                <input type="text" placeholder="Last Name" name="last_name" required>
                </div>
                <br>
                <div class="row">
                <input type="text" placeholder="Address" name="address" required>
                </div>
              <br>
              <div class="row">
              <input type="email" placeholder="Email Address" name="email" required>
              </div>
              <br>
              <div class="row">
                <input type="num" name="contact" placeholder="Contact No.">
              </div>
              <br>
              <div class="row">
                <input type="text" placeholder="Username" name="username" required>
              </div>
                <br>
              <div class="row">
              <input type="password" placeholder="Password" name="password" required>
              </div>

              <br>

              <div class="agreement">
                <input class="checkBox" type="checkbox" id="Privacy_Policy" required>
                <label for="Privacy_Policy"> By creating this account you agree to our 
                    <a href="">Terms of Use</a> & <a href="">Privacy Policy</a> 
                    <span></span>
                  </label>
              </div>

              <br>

              <div class="row">
              <button class="RegisterButton" name="submit">Register</button>
              </div>

                <div class="Login">Already have an account?
                <button id="LoginNow" class="LoginNow" onclick="LoginNow()"><a href="login.php">Login Now</a></button>
                </div>
              </form>

            </div>
            </div>
          </div>

          <div class="footer">
            <nav>
              <div>&copy; 2022 Koi Blends Cafe</div>
            </nav>
          </div>
                      
  </div>
  <!-- js -->
<script>
  // script for open login module
  document.getElementById("LoginNow").addEventListener("click", function(){
    document.querySelector(".LoginContainer").style.display = "block";
  })

  document.getElementById("close-btn").addEventListener("click", function(){
  document.querySelector(".LoginContainer").style.display = "none";
})
  </script>
</body>
</html>