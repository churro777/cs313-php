<?php
$servername = "ec2-23-23-227-188.compute-1.amazonaws.com";
$username = "mtfkybajvycpzz";
$password = "1f9afc981c3b38e57fe02247902708c1fb4e0014721d9397d4b6a43dc8b1a809";
$dbname = "dc3iv3q4t39i0c";

// Create connection
$conn = pg_connect("host=$servername port=5432 dbname=$dbname user=$username password=$password");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = pg_query($conn, "select * from scriptures");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Assign 5 - Testing Read-only DB</title>
    </head>
    <body>
        <h1>Testing Data Retrieval</h1>
    </body>
</html>
