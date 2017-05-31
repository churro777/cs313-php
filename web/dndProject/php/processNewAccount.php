<?php
session_start();

if ($_SESSION["newUser"] == "true"){
    echo "<h2>inserting a new user</h2>";
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
exit;
?>
