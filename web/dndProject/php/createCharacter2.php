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


/***************/
/*     STR     */
/***************/
// prepare the insert statement
try {
    echo "inside try for prepare <br />";
    $statement = $db->prepare('INSERT INTO abilityScores (character_id, type, score)
                                VALUES ((SELECT id FROM character WHERE charactername = :cn), :scoreType, :str);');
} catch (PDOException $ex) {
    echo "<br />Problem preparing statement. Details: $ex";
}

echo "prepared <br />";
// bind the variales to the corresponding item from the form on the previous page
$statement->bindParam(':cn', $_SESSION["character"], PDO::PARAM_STR);
$statement->bindParam(':scoreType', $STR, PDO::PARAM_STR);
$statement->bindParam(':str', $_POST["str"], PDO::PARAM_INT);
echo "binded <br />";

// try execute and echo the exception if there is one
try {
    $statement->execute();
} catch (PDOException $ex) {
    echo "Problem inserting ability score $STR. Details: $ex";
}
/***************/
/*     DEX     */
/***************/
// prepare the insert statement
try {
    echo "inside try for prepare <br />";
    $statement = $db->prepare('INSERT INTO abilityScores (character_id, type, score)
                                VALUES ((SELECT id FROM character WHERE charactername = :cn), :scoreType, :str);');
} catch (PDOException $ex) {
    echo "<br />Problem preparing statement. Details: $ex";
}

echo "prepared <br />";
// bind the variales to the corresponding item from the form on the previous page
$statement->bindParam(':cn', $_SESSION["character"], PDO::PARAM_STR);
$statement->bindParam(':scoreType', $DEX, PDO::PARAM_STR);
$statement->bindParam(':str', $_POST["DEX"], PDO::PARAM_INT);
echo "binded <br />";

// try execute and echo the exception if there is one
try {
    $statement->execute();
} catch (PDOException $ex) {
    echo "Problem inserting ability score $DEX. Details: $ex";
}
/***************/
/*     CON     */
/***************/
// prepare the insert statement
try {
    echo "inside try for prepare <br />";
    $statement = $db->prepare('INSERT INTO abilityScores (character_id, type, score)
                                VALUES ((SELECT id FROM character WHERE charactername = :cn), :scoreType, :str);');
} catch (PDOException $ex) {
    echo "<br />Problem preparing statement. Details: $ex";
}

echo "prepared <br />";
// bind the variales to the corresponding item from the form on the previous page
$statement->bindParam(':cn', $_SESSION["character"], PDO::PARAM_STR);
$statement->bindParam(':scoreType', $CON, PDO::PARAM_STR);
$statement->bindParam(':str', $_POST["con"], PDO::PARAM_INT);
echo "binded <br />";

// try execute and echo the exception if there is one
try {
    $statement->execute();
} catch (PDOException $ex) {
    echo "Problem inserting ability score $CON. Details: $ex";
}
/***************/
/*     INT     */
/***************/
// prepare the insert statement
try {
    echo "inside try for prepare <br />";
    $statement = $db->prepare('INSERT INTO abilityScores (character_id, type, score)
                                VALUES ((SELECT id FROM character WHERE charactername = :cn), :scoreType, :str);');
} catch (PDOException $ex) {
    echo "<br />Problem preparing statement. Details: $ex";
}

echo "prepared <br />";
// bind the variales to the corresponding item from the form on the previous page
$statement->bindParam(':cn', $_SESSION["character"], PDO::PARAM_STR);
$statement->bindParam(':scoreType', $INT, PDO::PARAM_STR);
$statement->bindParam(':str', $_POST["int"], PDO::PARAM_INT);
echo "binded <br />";

// try execute and echo the exception if there is one
try {
    $statement->execute();
} catch (PDOException $ex) {
    echo "Problem inserting ability score $INT. Details: $ex";
}
/***************/
/*     WIS     */
/***************/
// prepare the insert statement
try {
    echo "inside try for prepare <br />";
    $statement = $db->prepare('INSERT INTO abilityScores (character_id, type, score)
                                VALUES ((SELECT id FROM character WHERE charactername = :cn), :scoreType, :str);');
} catch (PDOException $ex) {
    echo "<br />Problem preparing statement. Details: $ex";
}

echo "prepared <br />";
// bind the variales to the corresponding item from the form on the previous page
$statement->bindParam(':cn', $_SESSION["character"], PDO::PARAM_STR);
$statement->bindParam(':scoreType', $WIS, PDO::PARAM_STR);
$statement->bindParam(':str', $_POST["wis"], PDO::PARAM_INT);
echo "binded <br />";

// try execute and echo the exception if there is one
try {
    $statement->execute();
} catch (PDOException $ex) {
    echo "Problem inserting ability score $WIS. Details: $ex";
}
/***************/
/*     STR     */
/***************/
// prepare the insert statement
try {
    echo "inside try for prepare <br />";
    $statement = $db->prepare('INSERT INTO abilityScores (character_id, type, score)
                                VALUES ((SELECT id FROM character WHERE charactername = :cn), :scoreType, :str);');
} catch (PDOException $ex) {
    echo "<br />Problem preparing statement. Details: $ex";
}

echo "prepared <br />";
// bind the variales to the corresponding item from the form on the previous page
$statement->bindParam(':cn', $_SESSION["character"], PDO::PARAM_STR);
$statement->bindParam(':scoreType', $CHA, PDO::PARAM_STR);
$statement->bindParam(':str', $_POST["cha"], PDO::PARAM_INT);
echo "binded <br />";

// try execute and echo the exception if there is one
try {
    $statement->execute();
} catch (PDOException $ex) {
    echo "Problem inserting ability score $CHA. Details: $ex";
}






// send the user to the next creator page
//header("Location: ../creator_2_scores.php");

?>
