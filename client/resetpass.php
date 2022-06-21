<?php include "../config/database.php" ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Full Stack Login Form</title>
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
    //check if form is submitted
      if (isset($_POST['send'])) {
        $email = htmlspecialchars($_POST['email']);

        //check if email is in the database
        $query = "SELECT email FROM user_info WHERE email = '$email'";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) == 0){
          echo ('<script> alert("This email does not exist in our system")</script>');
        } 
      }
    ?>
   
    <img class="wave" src="img/wave.png" />
    <div class="container">
      <div class="img">
        <img src="img/bg.svg" />
      </div>
      <div class="login-content">
        <form action =<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?> method="POST">
          <img src="img/avatar.svg" />
          <h2 class="title" style="font-size:2rem;">Reset Password</h2>
          <div class="input-div one" style="margin-top:1.5rem;">
            <div class="i">
              <i class="fas fa-user"></i>
            </div>
            <div class="div">
              <h5 style="font-size:1rem;">Enter you email for a verification code</h5>
              <input type="email" name="email" class="input" required
              oninvalid="this.setCustomValidity('Please Enter valid email')"
              oninput="setCustomValidity('')"
              />
            </div>
          </div>
          <input type="submit" name="send" class="btn" value="Send" />
        </form>
      </div>
    </div>
    <script src="main.js"></script>
  </body>
</html>
