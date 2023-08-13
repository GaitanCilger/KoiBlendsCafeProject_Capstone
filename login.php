<?php 
  include('config/constants.php');
  require_once('vendor/autoload.php');

  $clientID = "559196539285-7v9kfpdthtbp92bnpmik3jbvnatibrgd.apps.googleusercontent.com";
  $secret = "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";

  // Google API Client
  $gclient = new Google_Client();

  $gclient->setClientId($clientID);
  $gclient->setClientSecret($secret);
  $gclient->setRedirectUri('http://localhost/koiblends/login.php');


  $gclient->addScope('email');
  $gclient->addScope('profile');

if(isset($_GET['code'])){
    // Get Token
    $token = $gclient->fetchAccessTokenWithAuthCode($_GET['code']);

    // Check if fetching token did not return any errors
    if(!isset($token['error'])){
        // Setting Access token
        $gclient->setAccessToken($token['access_token']);

        // store access token
        $_SESSION['access_token'] = $token['access_token'];

        // Get Account Profile using Google Service
        $gservice = new Google_Service_Oauth2($gclient);

        // Get User Data
        $udata = $gservice->userinfo->get();
        $username = $udata['givenName'];
        $last_name = $udata['familyName'];
        $email = $udata['email'];

        $sql = "SELECT * FROM verifusers WHERE email = '$email' AND username ='$username'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0)
        {
            $userdata = mysqli_fetch_assoc($result);
            $_SESSION['userlog'] = "Login Successfull";
            $_SESSION['user'] = $username; //To check whether logged or not
            $_SESSION['uid'] = $userdata['id'];

            header('location:'.SITEURL.'index.php');
        }
        else
        {
            $sqlq = mysqli_query($conn,"INSERT INTO verifusers SET 
            email = '$email',
            first_name = '$username',
            last_name = '$last_name',
            username = '$username',
            email_verif_at = NOW(),
            status= 1
            ");

            $sql = mysqli_query($conn, "SELECT * FROM verifusers where username = '$username'");
            $row = mysqli_fetch_assoc($sql);

          if($row==true)
            {
              //User available
              $_SESSION['userlog'] = "Login Successfull";
              $_SESSION['user'] = $username; //To check whether logged or not
              $_SESSION['uid'] = $row['id'];

              header('location:'.SITEURL.'index.php');
            }
            else
            {
              //User not available
              $_SESSION['pdnm'] = "Username or Password did not match";
              header('location:'.SITEURL.'login.php');
            } 

            
        }
    }
}

?>

<!Doctype html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/login.php" media="all">
  <title>Account Login</title>
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

    if(isset($_SESSION['pdnm']))
    {
      echo '<div class="nmsg">
        <div class="notifmsg">
          <p>'.$_SESSION['pdnm'].'</p>
        </div>
      </div>';
      unset($_SESSION['pdnm']);
    }


    ?>
    
 <div class="container">

    <div class="column-1">
      <div class="backgroundContainer">
        <a href="index.php">
          <img class="bgDisplay" viewBox="0 0 24 24" src="svg/KoiBlendsTitle.svg" alt="bg">
        </a>
        
      </div>
    </div>
    
    <div class="column-2">
    <div class="wrapper">
      <div class="title"><span>Login Account</span></div>
      <p>Enter your account details.</p>
      <br>

      <form method="POST">
       
      <div class="row">
      <input type="text" placeholder="Username" name="username">
      </div>
      <br>
      <div class="row">
      <input type="password" placeholder="Password">
      </div>

      <div class="forgotPassword"><a href="recoverpsw.php">Forget Password?</a></div>
      <br>

      <div class="row">
      <button class="LoginButton" name="submit">Login</button>
      </div>
      <br>
      <div class="row">
        <a href="<?= $gclient->createAuthUrl() ?>" class="btnLoginGoogle"><img class="googleSvg" src="svg/google.svg">Sign in with Google</a>
        </div>

        <div class="Register">No Account yet?
        <button id="RegisterNow" class="RegisterNow" onclick="RegisterNow()"><a href="signup.php">Create Now</a></button>
        </div>
      </form>
      <?php

      if(isset($_POST["submit"])){
          $username = mysqli_real_escape_string($conn, trim($_POST['username']));
          $password = trim($_POST['password']);

          $sql = mysqli_query($conn, "SELECT * FROM verifusers where username = '$username'");
          $row = mysqli_fetch_assoc($sql);

          if($row==true)
            {
              //User available
              $_SESSION['userlog'] = "Login Successfull";
              $_SESSION['user'] = $username; //To check whether logged or not
              $_SESSION['uid'] = $row['id'];

              header('location: index.php');
            }
            else
            {
              //User not available
              $_SESSION['pdnm'] = "Username or Password did not match";
              header('location: login.php');
            } 
      }

  ?>

    </div>
    </div>
  </div>

  <div class="footer">
    <nav>
   
      <div> 2022 Koi Blends Cafe</div>
    </nav>
  </div>
                      
  </div>
  <!-- js -->
<script>
  // script for open Register module
  document.getElementById("RegisterNow").addEventListener("click", function(){
    document.querySelector(".LoginContainer").style.display = "block";
  })

 
  </script>
</body>
</html>