<?php
//create constant variables for database connection
define('DB_HOST', 'localhost');
define('DB_USER', 'farhankhan');
define('DB_PASS', 'farhan12345');
define('DB_NAME', 'users');
session_start();
//create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//check connection status
if(!$conn){
    die('Connection failed: '.mysqli_connect_error());
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="../client/img/avatar.svg"/>
</head>
</html>