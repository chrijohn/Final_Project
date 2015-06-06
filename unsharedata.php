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

$id = $_GET['id'];
$stmt = $mysqli->prepare ("UPDATE final SET share = 0 WHERE id = $id");
$stmt->execute();

$stmt = $mysqli->prepare ("SELECT id, username, beer, brewery, style, grade, notes, share 
							FROM final
							WHERE username = ?");

$stmt->bind_param("s", $_SESSION['user']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id, $username, $beer, $brewery, $style, $grade, $notes, $share);

	if ($stmt->num_rows > 0)
	{	 
		echo "<h3> All Your Reviews </h3>";
		echo "<table><tr><th>Username</td>
							<th>Beer</th>
							<th>Brewery</th>
							<th>Style</th>
							<th>Grade</th>
							<th>Notes</th>
							<th>Share/unShare</th>
							<th>Delete</th></tr>";
		while ($stmt->fetch())
		{
			echo "<tr><td>" . $username. "</td><td>"
							. $beer . "</td><td>"
							. $brewery . "</td><td>"
							. $style . "</td><td>"
							. $grade . "</td><td>"
							. $notes . "</td><td>";
			if ($share == 0)
			{
				echo "<form method='post' action = '' id='share form' />";
				echo "<input type='button' onclick='share($id)' value = 'share'>";
				echo "</td><td>";
				echo "<form method='post' action = '' id= 'delete' />";
				echo "<input type='button' onclick='deletedata($id)' value = 'delete'>";
				echo "</td></tr>";
			}
			else
			{
				echo "<form method='post' action = '' id='share form' />";
				echo "<input type='button' onclick='unshare($id)' value = 'unShare'>";
				echo "</td><td>";
				echo "<form method='post' action = '' id= 'delete' />";
				echo "<input type='button' onclick='deletedata($id)' value = 'delete'>";
				echo "</td></tr>";
			}
		}
		echo "</table>";
	}
	else
	{
		echo "<h3> You have no reviews </h3>";
	}

?>
</body>
</html>