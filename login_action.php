<?php
$servername = $_SERVER['SERVER_NAME'];
$username = "root";
$password = "";
$database = "login_data";
$table_name = "users";

$name = $_POST['login_username'];
$pass = $_POST['login_password'];

// Create connection
$connection = mysqli_connect($servername, $username, $password, $database) or die("Connecction not established....");

$query = "select username from users where username='{$name}'";
$result = mysqli_query($connection,$query) or die("can't find username");
$username_from_database = mysqli_fetch_array($result);
if($username_from_database['username'] === $name)
{
	$query = "select password from users where username='{$name}'";
	$result = mysqli_query($connection,$query);
	$password_from_database = mysqli_fetch_array($result);
	if($password_from_database['password'] === $pass)
	{
		// return the page after login
		echo "Login Successfull...";
		header("refresh:2; url=index.html");
	}
	else {
		echo "wrong password";
		header("refresh:2; url=login2.html");
		return;
	}
}
else {
	echo "wrong username";
	header("refresh:2; url=login2.html");
	return;
}

?>

