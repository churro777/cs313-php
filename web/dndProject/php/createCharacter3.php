<?php session_start();
echo "inside createCharacter3.php <br />";
// connect to the database
require 'connectToDb.php';
echo "connected to db <br />";

if (isset($_POST["Acrobatics"])) {
    echo $_POST["Acrobatics"] . "<br />";
} else {
    echo "Acrobatics";
}
if (isset($_POST["Animal Handling"])) {
    echo $_POST["Animal Handling"] . "<br />";
} else {
    echo "Animal Handling";
}
if (isset($_POST["Arcana"])) {
    echo $_POST["Arcana"] . "<br />";
} else {
    echo "Arcana";
}
if (isset($_POST["Athletics"])) {
    echo $_POST["Athletics"] . "<br />";
} else {
    echo "Athletics";
}
if (isset($_POST["Deception"])) {
    echo $_POST["Deception"] . "<br />";
} else {
    echo "Deception";
}
if (isset($_POST["History"])) {
    echo $_POST["History"] . "<br />";
} else {
    echo "History";
}
if (isset($_POST["Insight"])) {
    echo $_POST["Insight"] . "<br />";
} else {
    echo "Insight";
}
if (isset($_POST["Intimidation"])) {
    echo $_POST["Intimidation"] . "<br />";
} else {
    echo "Intimidation";
}
if (isset($_POST["Investigation"])) {
    echo $_POST["Investigation"] . "<br />";
} else {
    echo "Investigation";
}
if (isset($_POST["Medicine"])) {
    echo $_POST["Medicine"] . "<br />";
} else {
    echo "Medicine";
}
if (isset($_POST["Nature"])) {
    echo $_POST["Nature"] . "<br />";
} else {
    echo "Nature";
}
if (isset($_POST["Perception"])) {
    echo $_POST["Perception"] . "<br />";
} else {
    echo "Perception";
}
if (isset($_POST["Performance"])) {
    echo $_POST["Performance"] . "<br />";
} else {
    echo "Performance";
}
if (isset($_POST["Persuasion"])) {
    echo $_POST["Persuasion"] . "<br />";
} else {
    echo "Persuasion";
}
if (isset($_POST["Religion"])) {
    echo $_POST["Religion"] . "<br />";
} else {
    echo "Religion";
}
if (isset($_POST["Sleight of Hand"])) {
    echo $_POST["Sleight of Hand"] . "<br />";
} else {
    echo "Sleight of Hand";
}
if (isset($_POST["Stealth"])) {
    echo $_POST["Stealth"] . "<br />";
} else {
    echo "Stealth";
}
if (isset($_POST["Survival"])) {
    echo $_POST["Survival"] . "<br />";
} else {
    echo "Survival";
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
