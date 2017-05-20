<?php
    session_start();
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ( isset($password) ){
        if ($password == "5678"){
            $_SESSION["username"] = $username;
            header("Location:home.php");
        } else {
            header("Location: login.php");
            die();
        }
    } else {
        header("Location: login.php");
        die();
    }

?>
