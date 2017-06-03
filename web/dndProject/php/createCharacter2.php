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

// prepare the insert statement
$statement = $db->prepare('INSERT INTO abilityScores (character_id, type, score)
                            VALUES ((SELECT id FROM character WHERE charactername = :cn), :type, :str);');
echo "prepared <br />";
// bind the variales to the corresponding item from the form on the previous page
$statement->bindParam(':cn', $_SESSION["character"], PDO::PARAM_STR);
$statement->bindParam(':type', $STR, PDO::PARAM_STR);
$statement->bindParam(':str', $_POST["str"], PDO::PARAM_STR);
echo "binded <br />";

// try execute and echo the exception if there is one
try {
    $statement->execute();
} catch (PDOException $ex) {
    echo "Problem inserting character. Details: $ex";
}

echo "success!!";

// send the user to the next creator page
//header("Location: ../creator_2_scores.php");

?>
