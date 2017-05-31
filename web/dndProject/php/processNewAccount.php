<?php
session_start();

if ($_SESSION["newUser"] == "true"){
    echo "we did it";
}

require 'connectToDb.php';

require 'password.php';

$password = htmlspecialchars($_POST['password']);

$passwordHash = password_hash($password, PASSWORD_DEFAULT);
echo $passwordHash;

echo $_POST['password'];
echo $_POST['firstName'];
echo $_POST['lasttName'];
echo $_POST['userName'];

$statement = $db->prepare('INSERT INTO player(firstName, lastName, username, password) VALUES (:fn, :ln, :un, :ps);');
$statement->bindParam(':fn', $_POST["firstName"], PDO::PARAM_STR);
$statement->bindParam(':ln', $_POST["lasttName"], PDO::PARAM_STR);
$statement->bindParam(':un', $_POST["userName"], PDO::PARAM_STR);
$statement->bindParam(':ps', $passwordHash, PDO::PARAM_STR);

$statement->execute();

?>
