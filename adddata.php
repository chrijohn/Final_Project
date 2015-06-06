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


$username = $_SESSION['user'];
$beer = $_GET['beer'];
$brewery = $_GET['brewery'];
$style = $_GET['style'];
$grade = $_GET['grade'];
$notes = $_GET['notes'];
$share = $_GET['share'];

$stmt = $mysqli ->prepare("INSERT INTO final (username, beer, brewery, style, grade, notes, share)
							VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssisi", $username, $beer, $brewery, $style, $grade, $notes, $share);

if (!$stmt->execute()) 
{
	echo "<h3>" . $beer . " was not added </h3>";
}
else
{
	echo "<h3>"  . $beer . " added successfully. </h3>";
}
?>
