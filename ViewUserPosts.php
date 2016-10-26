<?php
$username = "layer";
$password = "layer";
$host = "mysql.eecs.ku.edu";
$dbname = "layer";

$conn = new mysqli("$host", "$username", "$password", "$dbname");

if($conn->connect_error) {
	die("Failed to connect to the database: " . $conn->connect_error);
}
				
//user selected -> author of the posts
$author = $_POST['userid'];

$result = $conn->query("SELECT * FROM posts WHERE author_id ='" . $author . "'");

//check query
if(!$result) {
    die ("failed to run query.");
} else {
    if($result->num_rows === 0) {
        echo "The user with ID: ". $author . " has not submitted any post.";
    } else {
        //build the table of Post ID and Content from $author
        echo "<h2>Posts by " . $author . "</h2>";
        echo "<table>";
        echo "<tr>";
        echo "<th>Post ID</th>";
        echo "<th>Content</th>";
        echo "<tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['post_id'] . "</td>"."<td>" . $row['content'] . "</td>";
            echo "</tr>";
        }
        $result->free();
        echo "</table>";
    }
}

$conn->close();
?>