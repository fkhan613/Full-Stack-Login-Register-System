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
    <?php
      //declare variables
      $email = $password = $confirm_password = $first_name = $last_name = "";

      //check if form is submitted
      if (isset($_POST['register'])) {
        //assign variables
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $confirm_password = htmlspecialchars($_POST['retypedPass']);
        $first_name = htmlspecialchars($_POST['fName']);
        $last_name = htmlspecialchars($_POST['lName']);

        //check if all fields are filled
        if (
          !empty($email) &&
          !empty($password) &&
          !empty($confirm_password) &&
          !empty($first_name) &&
          !empty($last_name)
        ) {
          //check if passwords match
          if ($password == $confirm_password) {
            //check if email is valid
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
              //check if email already exists
              $query = "SELECT * FROM user_info WHERE email = '$email'";
              $result = mysqli_query($conn, $query);
              if (mysqli_num_rows($result) > 0) {
                echo "<script>alert('Email already exists')</script>";
              } else {
                //insert user into database
                $query = "INSERT INTO user_info (email, password, first_name, last_name) VALUES ('$email', '$password', '$first_name', '$last_name')";
                $result = mysqli_query($conn, $query);
                if ($result) {
                  echo "<p class='success'>Registration successful</p>";
                  header('Location: index.php');
                } else {
                  echo "<script>alert('Error creating user')</script>";
                }
              }
            } else {
              echo "<script>alert('Invalid email')</script>";
            }
          } else {
            echo "<script>alert('Passwords do not match')</script>";
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
        <form action=<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?> method="POST" >
          <img src="img/avatar.svg" />
          <h2 class="title">Register</h2>
          <div class="input-div one">
            <div class="i">
              <i class="fas fa-user"></i>
            </div>
            <div class="div">
              <h5>First Name</h5>
              <input type="text" name= "fName" class="input" required
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
              <input type="text" name="lName" class="input" required
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
              <input type="email" name= "email" class="input" required
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

          <div class="input-div pass">
            <div class="i">
              <i class="fas fa-lock"></i>
            </div>
            <div class="div">
              <h5>Confirm Password</h5>
              <input type="password" name="retypedPass" class="input" required
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
