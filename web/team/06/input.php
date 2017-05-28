<?php
$user = 'jim';
$password = 'password123';

$db = new PDO('pgsql:host=localhost;dbname=arturoaguila', $user, $password);


$newScripture = $db->prepare('INSERT INTO scripture (book, chapter, verse) VALUES (:book,:chapter,:verse);');
$newScripture->bindParam(':book', $_POST['book']);
$newScripture->bindParam(':chapter', $_POST['chapter']);
$newScripture->bindParam(':verse', $_POST['verse']);
$newScripture->execute();



$newScripture = $db->prepare('INSERT INTO topic (topic) VALUES (:topic);');
$newScripture->bindParam(':topics', $_POST[]);

$newScripture->fetch();

?>
