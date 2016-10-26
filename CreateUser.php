<?php
$username = "layer";
$password = "layer";
$host = "mysql.eecs.ku.edu";
$dbname = "layer";

$conn = new mysqli("$host", "$username", "$password", "$dbname");

if($conn->connect_error) {
    die("Failed to connect to the database: " . $conn->connect_error);
}

$userid = $_POST['userid'];

if(!empty($_POST)) {
    if(empty($_POST['userid'])) {
        die ("Enter User ID");
    }
}

$query = " SELECT * FROM users WHERE user_id = '$userid' ";
$result= $conn->query($query);

if (!$result) {
    die("Failed to run query.");
}

$row = $result->fetch_assoc();
if ($row) {
    die("This user id has been used.");
}

$query = "INSERT INTO users (user_id) VALUES ('$userid')";
$result = $conn->query($query);

if (!$result) {
    die("Failed to run query: ");
}

echo "User created successfully.";

$result->free();
$conn->close();
?>
