<?php session_start();
    $_SESSION["character"] = $_GET["newCharacter"];
    header("Location: ../content.php");
?>
