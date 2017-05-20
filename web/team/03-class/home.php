<?php

session_start();

if (!isset($_SESSION["username"])){
    header("Location:login.php");
    die();
}

$username = $_SESSION["username"];

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Welcome</title>
    </head>
    <body>
        <?php echo "<h1>Welcome $username</h1>" ?>
    </body>
</html>
