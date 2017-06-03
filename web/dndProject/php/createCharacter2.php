<?php session_start();
// connect to the database
require 'connectToDb.php';

echo "STR - " . $_POST["str"] . "<br />";
echo "DEX - " . $_POST["dex"] . "<br />";
echo "CON - " . $_POST["con"] . "<br />";
echo "INT - " . $_POST["int"] . "<br />";
echo "WIS - " . $_POST["wis"] . "<br />";
echo "CHA - " . $_POST["cha"] . "<br />";

$STR = "STR";
$DEX = "DEX";
$CON = "CON";
$INT = "INT";
$WIS = "WIS";
$CHA = "CHA";

insertScore($_SESSION["character"], "STR", $_POST["str"]);
echo "function worked";



function insertScore($characterName, $scoreType, $score){
    echo "inside insertScore() <br />";
    // prepare the insert statement
    try {
        echo "inside try for prepare <br />";
        $statement = $db->prepare('INSERT INTO abilityScores (character_id, type, score) VALUES ((SELECT id FROM character WHERE charactername = :cn), :scoreType, :str);');
    } catch (PDOException $ex) {
        echo "<br />Problem preparing statement. Details: $ex";
    }

    echo "prepared <br />";
    // bind the variales to the corresponding item from the form on the previous page
    $statement->bindParam(':cn', $characterName, PDO::PARAM_STR);
    $statement->bindParam(':scoreType', $scoreType, PDO::PARAM_STR);
    $statement->bindParam(':str', $score, PDO::PARAM_INT);
    echo "binded <br />";

    // try execute and echo the exception if there is one
    try {
        $statement->execute();
    } catch (PDOException $ex) {
        echo "Problem inserting character. Details: $ex";
    }

    echo "success!!";
}





// send the user to the next creator page
//header("Location: ../creator_2_scores.php");

?>
