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
      //declare variables
      $email = $password = "";

      //check if form is submitted
      if (isset($_POST['login'])) {
        //assign variables
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        //check if all fields are filled
        if (!empty($email) && !empty($password)) {
          //check if email is valid
          if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            //check if email exists
            $query = "SELECT * FROM user_info WHERE email = '$email'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
              //check if password is correct
              $row = mysqli_fetch_assoc($result);
              if ($row['password'] == $password) {
                //login successful
                session_start();
                $_SESSION['email'] = $email;
                header('Location: clientsection.html');
              } else {
                echo "<script>alert('Invalid password')</script>";
              }
            } else{
              echo "<script>alert('Email does not exist')</script>";
            }
          } 
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
          <h2 class="title">Welcome</h2>
          <div class="input-div one">
            <div class="i">
              <i class="fas fa-user"></i>
            </div>
            <div class="div">
              <h5>Email</h5>
              <input type="email" name="email" class="input" required
              oninvalid="this.setCustomValidity('Please Enter valid email')"
              oninput="setCustomValidity('')"
              />
            </div>
          </div>
          <div class="input-div pass">
            <div class="i">
              <i class="fas fa-lock"></i>
            </div>
            <div class="div">
              <h5>Password</h5>
              <input type="password" name="password" class="input" required
                oninvalid="this.setCustomValidity('Please Enter valid password')"
                oninput="setCustomValidity('')"
              />
            </div>
          </div>
          <a href="#">Forgot Password?</a>
          <input type="submit" name="login" class="btn" value="Login" />
          <a href="register.php" style="text-align: center;"> Create an account</a>
        </form>
      </div>
    </div>
    <script src="main.js"></script>
  </body>
</html>
