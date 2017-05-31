<?php

session_start();

$username = $_POST["username"];
$password = $_POST["password"];

if (isset($username) && isset($password)){
    echo "yay";
}


?>
