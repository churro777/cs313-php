<?php session_start();
echo "inside createCharacter3.php <br />";
// connect to the database
require 'connectToDb.php';
echo "connected to db <br />";

if (issset($_POST["Acrobatics"])) {
    echo $_POST["Acrobatics"] . "<br />";
}
if (issset($_POST["Animal Handling"])) {
    echo $_POST["Animal Handling"] . "<br />";
}
if (issset($_POST["Arcana"])) {
    echo $_POST["Arcana"] . "<br />";
}
if (issset($_POST["Athletics"])) {
    echo $_POST["Athletics"] . "<br />";
}
if (issset($_POST["Deception"])) {
    echo $_POST["Deception"] . "<br />";
}
if (issset($_POST["History"])) {
    echo $_POST["History"] . "<br />";
}
if (issset($_POST["Insight"])) {
    echo $_POST["Insight"] . "<br />";
}
if (issset($_POST["Intimidation"])) {
    echo $_POST["Intimidation"] . "<br />";
}
if (issset($_POST["Investigation"])) {
    echo $_POST["Investigation"] . "<br />";
}
if (issset($_POST["Medicine"])) {
    echo $_POST["Medicine"] . "<br />";
}
if (issset($_POST["Nature"])) {
    echo $_POST["Nature"] . "<br />";
}
if (issset($_POST["Perception"])) {
    echo $_POST["Perception"] . "<br />";
}
if (issset($_POST["Performance"])) {
    echo $_POST["Performance"] . "<br />";
}
if (issset($_POST["Persuasion"])) {
    echo $_POST["Persuasion"] . "<br />";
}
if (issset($_POST["Religion"])) {
    echo $_POST["Religion"] . "<br />";
}
if (issset($_POST["Sleight of Hand"])) {
    echo $_POST["Sleight of Hand"] . "<br />";
}
if (issset($_POST["Stealth"])) {
    echo $_POST["Stealth"] . "<br />";
}
if (issset($_POST["Survival"])) {
    echo $_POST["Survival"] . "<br />";
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
