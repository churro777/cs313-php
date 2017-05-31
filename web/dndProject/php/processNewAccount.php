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
echo "<p>1</p>";
require 'password.php';
echo "<p>2</p>";
$password = htmlspecialchars($_GET['password']);
echo "<p>3</p>";

$passwordHash = password_hash($password, PASSWORD_DEFAULT);
echo "<p>4</p>";


echo $_GET['password'];
echo $_GET['firstName'];
echo $_GET['lastName'];
echo $_GET['username'];

$statement = $db->prepare('INSERT INTO player(firstName, lastName, username, password) VALUES (:fn, :ln, :un, :ps);');
echo "<p>5</p>";

$statement->bindParam(':fn', $_GET["firstName"], PDO::PARAM_STR);
echo "<p>6</p>";

$statement->bindParam(':ln', $_GET["lastName"], PDO::PARAM_STR);
echo "<p>7</p>";

$statement->bindParam(':un', $_GET["username"], PDO::PARAM_STR);
echo "<p>8</p>";

$statement->bindParam(':ps', $passwordHash, PDO::PARAM_STR);
echo "<p>9</p>";


$statement->execute();
echo "<p>10</p>";


?>
