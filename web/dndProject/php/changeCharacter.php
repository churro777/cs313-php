<?php session_start();
    $_SESSION["character"] = $_GET["newCharacter"];
    var_dump($_SESSION);
    //header("Location: ../content.php");
?>
