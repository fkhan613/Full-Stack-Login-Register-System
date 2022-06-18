<?php include "../config/database.php" ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Full Stack Register Form</title>
    <link rel="stylesheet" href="style.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap"
      rel="stylesheet"
    />
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
  </head>
  <body>
    <img class="wave" src="img/wave.png" />
    <div class="container">
      <div class="img">
        <img src="img/bg.svg" />
      </div>
      <div class="login-content">
        <form action="index.php">
          <img src="img/avatar.svg" />
          <h2 class="title">Register</h2>
          <div class="input-div one">
            <div class="i">
              <i class="fas fa-user"></i>
            </div>
            <div class="div">
              <h5>First Name</h5>
              <input type="text" class="input" required
              oninvalid="this.setCustomValidity('Please Enter a first name')"
              oninput="setCustomValidity('')"
              />
            </div>
          </div>
          <div class="input-div one">
            <div class="i">
              <i class="fas fa-user"></i>
            </div>
            <div class="div">
              <h5>Last Name</h5>
              <input type="text" class="input" required
              oninvalid="this.setCustomValidity('Please Enter a last name')"
              oninput="setCustomValidity('')"
              />
            </div>
          </div>
          <div class="input-div one">
            <div class="i">
              <i class="fa fa-envelope"></i>
            </div>
            <div class="div">
              <h5>Email</h5>
              <input type="email" class="input" required
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
              <input type="password" class="input" required
                oninvalid="this.setCustomValidity('Please Enter valid password')"
                oninput="setCustomValidity('')"
              />
            </div>
          </div>

          <div class="input-div pass">
            <div class="i">
              <i class="fas fa-lock"></i>
            </div>
            <div class="div">
              <h5>Confirm Password</h5>
              <input type="password" class="input" required
                oninvalid="this.setCustomValidity('Please Enter valid password')"
                oninput="setCustomValidity('')"
              />
            </div>
          </div>
          <input type="submit" name = "register" class="btn" value="Register" />
        </form>
      </div>
    </div>
    <script src="main.js"></script>
  </body>
</html>
