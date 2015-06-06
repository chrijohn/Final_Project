<!DOCTYPE html>
<html>
<head>
<style>
</style>
</head>
<body>

<?php
session_start();

$servername = "oniddb.cws.oregonstate.edu";
$username = "chrijohn-db";
$password = "MOHdCKVzIRh8lL2I";
$dbname = "chrijohn-db";

$mysqli = new mysqli($servername, $username, $password, $dbname);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$stmt = $mysqli->prepare ("SELECT username, beer, brewery, style, grade, notes, share 
							FROM final
							WHERE share = 1");
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($username, $beer, $brewery, $style, $grade, $notes, $share);

	if ($stmt->num_rows > 0)
	{	 
		echo "<h3> All Shared Reviews </h3>";
		echo "<table><tr><th>Username</td>
							<th>Beer</th>
							<th>Brewery</th>
							<th>Style</th>
							<th>Grade</th>
							<th>Notes</th></tr>";
		while ($stmt->fetch())
		{
			echo "<tr><td>" . $username. "</td><td>"
							. $beer . "</td><td>"
							. $brewery . "</td><td>"
							. $style . "</td><td>"
							. $grade . "</td><td>"
							. $notes . "</td></tr>";
		}
		echo "</table>";
	}
	else
	{
		echo "<h3> There are no reviews </h3>";
	}

?>
</body>
</html>