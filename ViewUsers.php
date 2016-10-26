<?php
$username = "layer";
$password = "layer";
$host = "mysql.eecs.ku.edu";
$dbname = "layer";

$conn = new mysqli("$host", "$username", "$password", "$dbname");

if($conn->connect_error) {
    die("Failed to connect to the database: " . $conn->connect_error);
}

	
// retrieve a list of members
$query = "SELECT user_id FROM users";

$result = $conn->query($query);

if(!$result) {
	die ("failed to run query.");
} else {
	echo "<table>";
	echo "<tr><td><h3>All Users</h3></td></tr>";
	//Output data
	while($row = $result->fetch_assoc()) {
		echo "<tr>";
		echo "<td>". $row["user_id"]. "</td>";
		echo "</tr>";
	}
	echo "</table>";
	$result->free();
}

$conn->close();
?>