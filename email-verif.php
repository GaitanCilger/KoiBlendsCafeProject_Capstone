<?php include('config/constants.php');  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/email-verif.php" />
    <title>Verify Account</title>
</head>

<body>
    <?php
 
        if (isset($_POST["verify_email"]))
        {
            $verification_code = $_SESSION['vc'];
            $email = $_SESSION['mail'];
            $verif_code = $_POST["verif_code"];
     
            if($verification_code != $verif_code){
                ?>
               <script>
                   alert("Invalid verification code");
               </script>
               <?php
            }else{
                $sql = "UPDATE verifusers SET status = 1, email_verif_at = NOW() WHERE email = '" . $email . "' AND verification_code = '" . $verification_code . "'";
                $result  = mysqli_query($conn, $sql);
                ?>
                 <script>
                    window.location.replace("verified.php");
                 </script>
                 <?php
            }

        }

    ?>
     
    <form method="POST">
        <div class="container">
            <h2>Verify Your Account</h2>
            <p>We sent a verification code to your email <br/> Enter the code below to confirm your
                email address.</p>
            <div class="code-container">
                <input type="text" class="code" name="verif_code"required>
            </div>
            <small class="info">
                <button class="eb" name="verify_email">Verify</button>
            </small>
        </div>
    </form>
</body>

</html>