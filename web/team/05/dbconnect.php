<?php
$servername = "localhost";
$username = "postgres";
$password = "champ25";
$dbname = "test";

// Create connection
$conn = pg_connect("host=localhost port=5432 dbname=test user=postgres password=champ25");
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
        <title>Testing connection to database</title>
    </head>
    <body>
        <h2>Scripture Resources</h2>
        <?php
            while ($row = pg_fetch_array($result)) {
                //do stuff with $row
                echo "<b>$row[1] $row[2]:$row[3]</b> - $row[4] <br /><br />";
           }
        ?>
    </body>
</html>
