<?php

session_start();

$username = $_POST["username"];
$password = $_POST["password"];

if (isset($username) && isset($password)){

    require 'connectToDb.php';

    $statement = $db->prepare('SELECT password FROM player WHERE username = :un;');
    $statement->bindParam(':un', $_POST["username"], PDO::PARAM_STR);

    $statement->execute();
    $passwordHash = $statement->fetch();

    if(password_verify($password, $passwordHash[0]) ) {
        echo "SUCCESS";
    } else {
        $_SESSION["badLogin"] = "true";
    }


}


?>
