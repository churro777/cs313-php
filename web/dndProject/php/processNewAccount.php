<?php
session_start();

if ($_SESSION["newUser"] == "true"){
    echo "we did it";
}

require 'connectToDb.php';

?>
