<?php
$servername = $_SERVER['SERVER_NAME'];
$username = "root";
$password = "";
$database = "login_data";
$table_name = "users";

// Create connection
$connection = mysqli_connect($servername, $username, $password, $database) or die("Unable to make connection to Server....");

// Fatch username and password from Post Method

$name = $_POST['signup_username'];
$password = $_POST['signup_password'];

// Insert Data in Database

$sql = "insert into {$table_name} (username,password) values('{$name}','{$password}')";

mysqli_query($connection,$sql) or die("Data not Inserted...");

header("refresh:2; url=index.html");

?>