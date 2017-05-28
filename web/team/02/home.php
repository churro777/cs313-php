<?php
// Start the session
session_start();
$_SESSION["user"] = "Tester";
if (isset($_POST["admin"])){
    $_SESSION["user"] = "Administrator";
} elseif (isset($_POST["test"])){
    $_SESSION["user"] = "Tester";
} elseif (isset($_POST["logout"])){
    session_unset();
    session_destroy();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Green Lamps</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>
        <?php
            $home = 'active';
            include 'header.php'; ?>

        <!-- <p>Welcome to our website!</p> -->

        <?php
            if (isset($_SESSION["user"])){
                echo "<p>Welcome " . $_SESSION["user"] .  "</p>";
            }
            else {
                echo "You're not logged in...";
            }
         ?>




    </body>
</html>
