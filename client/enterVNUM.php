<?php include "../config/database.php" ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Verify Email</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap"
      rel="stylesheet"
    />
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
  </head>
  <body>
    <?php
        if (isset($_POST['send'])) {
        $email = htmlspecialchars($_REQUEST['email']);
        $_SESSION['email'] = $email;
        //check if email is in the database
        $query = "SELECT email FROM user_info WHERE email = '$email'";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) == 0){
          echo ('<script> alert("This email does not exist in our system"); window.location.href = "enteremail.php"; </script>');
        } else{
           $verificationNum = rand(1000,9999);
           $_SESSION['verificationNum'] = $verificationNum;
        }
      }

        if (isset($_POST['verify'])) {
        $input = htmlspecialchars($_POST['input']);
        
        if($input == $_SESSION['verificationNum']){
            header("Location: resetpass.php");
        }
      }
      
    ?>
    <img class="wave" src="img/wave.png" />
    <div class="container">
      <div class="img">
        <img src="img/bg.svg" />
      </div>
      <div class="login-content">
        <form action=<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?> method="POST">
          <img src="img/avatar.svg" />
          <h2 class="title" style="font-size:2rem;">Verification</h2>
          <div class="input-div pass">
            <div class="i">
              <i class="fas fa-lock"></i>
            </div>
            <div class="div">
              <h5>Enter the Verification Code</h5>
              <input type="password" name="input" class="input" required
                oninvalid="this.setCustomValidity('Please Enter valid password')"
                oninput="setCustomValidity('')"
              />
            </div>
          </div>
          <input type="submit" name="verify" class="btn" value="verify" />
          <p><?php echo("Copy and paste this code in the input field: " . $_SESSION['verificationNum'])?></p>
        </form>
      </div>
    </div>
    <script src="main.js"></script>
  </body>
</html>
