<?php
session_start();
ini_set('display_errors', 'On');

$servername = "oniddb.cws.oregonstate.edu";
$username = "chrijohn-db";
$password = "MOHdCKVzIRh8lL2I";
$dbname = "chrijohn-db";

$mysqli = new mysqli($servername, $username, $password, $dbname);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$username = $_POST['user'];
$password = md5($_POST['pass']);

$stmt = $mysqli->prepare ("SELECT username, password FROM users WHERE username= ? AND password = ?");	

$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0)
{
	$_SESSION['user'] = $_POST['user'];
	echo "Log in successful. ";
	echo 'Click <a href="ViewData.php">here</a> to enter';
	
}
else
{
	echo "Wrong username or password";
}



?>