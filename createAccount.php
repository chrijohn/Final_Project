<?php
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
$password = $_POST['pass'];



$stmt = $mysqli->prepare ("SELECT username FROM users WHERE username= ?");	

$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0)
{
	echo "That username is already taken";
}
else
{
	$username = $_POST['user'];
	$password = md5($_POST['pass']);
	
	$stmt = $mysqli ->prepare("INSERT INTO users (username, password) VALUES (?,?)");
	$stmt -> bind_param("ss", $username, $password);
	
	if (!$stmt->execute()) 
	{
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	}
	else
	{
		echo "Account Created";
	}
}



?>