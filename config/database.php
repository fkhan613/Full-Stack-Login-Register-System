<?php
//create constant variables for database connection
define('DB_HOST', 'sql206.epizy.com');
define('DB_USER', 'epiz_31993830');
define('DB_PASS', 'uiQlkDOcegNYj');
define('DB_NAME', 'epiz_31993830_users');

//create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//check connection status
if(!$conn){
    die('Connection failed: '.mysqli_connect_error());
} 
?>