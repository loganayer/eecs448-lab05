<?php
$username = "layer";
$password = "layer";
$host = "mysql.eecs.ku.edu";
$dbname = "layer";

$conn = new mysqli("$host", "$username", "$password", "$dbname");

if($conn->connect_error) {
	die("Failed to connect to the database: " . $conn->connect_error);
}

//checkbox
$checkbox = $_POST['delete'];

if(empty($checkbox)) {
    echo("No delete request.");
} else {
    //count the number of checkbox selected
    $count = count($checkbox);

    for($i=0; $i < $count; $i++)
    {
        echo("Post ID " .$checkbox[$i] . " is selected to delete." . "<br>");
        $result = $conn->query("DELETE FROM posts WHERE post_id ='" . $checkbox[$i] . "'");
        //check query
        if(!$result) {
            die ("failed to run query.");
        }
    }
    echo("<br> You have deleted $count posts. <br>");
}
$conn->close();
?>