<?php include "../config/database.php" ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="adminpage.css?v=<?php echo time(); ?>">

  </head>
  <body>
    <?php 
      $query = "SELECT * FROM user_info";
      $result = mysqli_query($conn,$query);
      $user = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>
      <h1>Admin Dashboard</h1>
      <div class="user-container">
        <?php foreach($user as $user): ?>
          <div class="user">
            <p><?php echo $user['id']?></p>
            <p><?php echo $user['first_name']?></p>
            <p><?php echo $user['last_name']?></p>
            <p><?php echo $user['email']?></p>
            <p><?php echo $user['password']?></p>
            <p><?php echo $user['date_created']?></p>
          </div>
         <?php endforeach;?>
      </div>
  </body>
</html>
