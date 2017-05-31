<?php
session_start();

if ($_SESSION["newUser"] == "true"){
    echo "we did it";
}

echo $_GET['password'];
echo $_GET['firstName'];
echo $_GET['lasttName'];
echo $_GET['userName'];


require 'connectToDb.php';

require 'password.php';

$password = htmlspecialchars($_GET['password']);

$passwordHash = password_hash($password, PASSWORD_DEFAULT);
echo $passwordHash;

echo $_GET['password'];
echo $_GET['firstName'];
echo $_GET['lasttName'];
echo $_GET['userName'];

$statement = $db->prepare('INSERT INTO player(firstName, lastName, username, password) VALUES (:fn, :ln, :un, :ps);');
$statement->bindParam(':fn', $_GET["firstName"], PDO::PARAM_STR);
$statement->bindParam(':ln', $_GET["lasttName"], PDO::PARAM_STR);
$statement->bindParam(':un', $_GET["userName"], PDO::PARAM_STR);
$statement->bindParam(':ps', $passwordHash, PDO::PARAM_STR);

$statement->execute();

?>
