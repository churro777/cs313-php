<?php

$dbHost = 'localhost';
$dbPort = '5432';
$dbName = 'test';
$user = 'postgres';
$pass = 'champ25';

try {
    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $ex) {
    echo "Error connecting to the db. Details: $ex";
    die();
}

?>
