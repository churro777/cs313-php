<?php
session_start();

if ($_SESSION["newUser"] == "true"){
    echo "<h2>inserting a new user</h2>";
}

echo $_GET['password'];
echo $_GET['firstName'];
echo $_GET['lastName'];
echo $_GET['username'];


require 'connectToDb.php';

require 'password.php';

$password = htmlspecialchars($_GET['password']);

$passwordHash = password_hash($password, PASSWORD_DEFAULT);
echo $passwordHash;

echo $_GET['password'];
echo $_GET['firstName'];
echo $_GET['lastName'];
echo $_GET['username'];

$statement = $db->prepare('INSERT INTO player(firstName, lastName, username, password) VALUES (:fn, :ln, :un, :ps);');
$statement->bindParam(':fn', $_GET["firstName"], PDO::PARAM_STR);
$statement->bindParam(':ln', $_GET["lastName"], PDO::PARAM_STR);
$statement->bindParam(':un', $_GET["username"], PDO::PARAM_STR);
$statement->bindParam(':ps', $passwordHash, PDO::PARAM_STR);

$statement->execute();

?>
