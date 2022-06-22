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