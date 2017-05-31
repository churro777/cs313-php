<?php
session_start();

// make sure a new user is trying to create an account otherwise send them back to the login page
if ($_SESSION["newUser"] != "true"){
    header("Location: ../index.php");
}
require 'connectToDb.php';

$password = htmlspecialchars($_POST['password']);

$passwordHash = password_hash($password, PASSWORD_DEFAULT);

$statement = $db->prepare('INSERT INTO player(firstName, lastName, username, password) VALUES (:fn, :ln, :un, :ps);');
$statement->bindParam(':fn', $_POST["firstName"], PDO::PARAM_STR);
$statement->bindParam(':ln', $_POST["lastName"], PDO::PARAM_STR);
$statement->bindParam(':un', $_POST["username"], PDO::PARAM_STR);
$statement->bindParam(':ps', $passwordHash, PDO::PARAM_STR);

$statement->execute();

header("Location: ../index.php");

$_SESSION["newUser"] = "false";

exit;
?>
