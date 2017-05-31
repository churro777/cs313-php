<?php

session_start();

$username = $_POST["username"];
$password = $_POST["password"];

if (isset($username) && isset($password)){
echo "1";
    require 'connectToDb.php';
    echo "2";

    $statement = $db->prepare('SELECT password FROM player WHERE username = :un;');
    $statement->bindParam(':un', $_POST["username"], PDO::PARAM_STR);
    echo "3";

    $statement->execute();
    $passwordHash = $statement->fetch();
    echo "4  ";
echo $passwordHash[0] . "     ";
    if(password_verify($password, $passwordHash[0]) ) {
        echo $passwordHash[0];

        echo "SUCCESS";
    } else {
        $_SESSION["badLogin"] = "true";
        echo "TERRIBLE";
    }
    echo "5";


}


?>
