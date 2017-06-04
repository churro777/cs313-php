<?php session_start();
// connect to the database
require 'connectToDb.php';

if (issset($_SESSION["Acrobatics"])) {
    echo $_SESSION["Acrobatics"] . "<br />";
}
if (issset($_SESSION["Animal Handling"])) {
    echo $_SESSION["Animal Handling"] . "<br />";
}
if (issset($_SESSION["Arcana"])) {
    echo $_SESSION["Arcana"] . "<br />";
}
if (issset($_SESSION["Athletics"])) {
    echo $_SESSION["Athletics"] . "<br />";
}
if (issset($_SESSION["Deception"])) {
    echo $_SESSION["Deception"] . "<br />";
}
if (issset($_SESSION["History"])) {
    echo $_SESSION["History"] . "<br />";
}
if (issset($_SESSION["Insight"])) {
    echo $_SESSION["Insight"] . "<br />";
}
if (issset($_SESSION["Intimidation"])) {
    echo $_SESSION["Intimidation"] . "<br />";
}
if (issset($_SESSION["Investigation"])) {
    echo $_SESSION["Investigation"] . "<br />";
}
if (issset($_SESSION["Medicine"])) {
    echo $_SESSION["Medicine"] . "<br />";
}
if (issset($_SESSION["Nature"])) {
    echo $_SESSION["Nature"] . "<br />";
}
if (issset($_SESSION["Perception"])) {
    echo $_SESSION["Perception"] . "<br />";
}
if (issset($_SESSION["Performance"])) {
    echo $_SESSION["Performance"] . "<br />";
}
if (issset($_SESSION["Persuasion"])) {
    echo $_SESSION["Persuasion"] . "<br />";
}
if (issset($_SESSION["Religion"])) {
    echo $_SESSION["Religion"] . "<br />";
}
if (issset($_SESSION["Sleight of Hand"])) {
    echo $_SESSION["Sleight of Hand"] . "<br />";
}
if (issset($_SESSION["Stealth"])) {
    echo $_SESSION["Stealth"] . "<br />";
}
if (issset($_SESSION["Survival"])) {
    echo $_SESSION["Survival"] . "<br />";
}










// // prepare the insert statement
// $statement = $db->prepare('INSERT INTO character (player_id, charactername, race_id, class_id, level, experience)
//                             VALUES ((SELECT id FROM player WHERE username = :un),
//                                     :cn,
//                                     (SELECT id FROM race WHERE racename = :r),
//                                     (SELECT id FROM class WHERE classname = :c),
//                                     1, 1);');
// // bind the variales to the corresponding item from the form on the previous page
// $statement->bindParam(':un', $_SESSION["username"], PDO::PARAM_STR);
// $statement->bindParam(':cn', $_POST["characterName"], PDO::PARAM_STR);
// $statement->bindParam(':r', $_POST["raceChoice"], PDO::PARAM_STR);
// $statement->bindParam(':c', $_POST["classChoice"], PDO::PARAM_STR);
//
// // try execute and echo the exception if there is one
// try {
//     $statement->execute();
// } catch (PDOException $ex) {
//     echo "Problem inserting character. Details: $ex";
// }

// send the user to the next creator page
// header("Location: ../creator_2_scores.php");

?>
