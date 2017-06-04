<?php session_start();
echo "inside createCharacter3.php <br />";
// connect to the database
require 'connectToDb.php';
echo "connected to db <br />";

if (issset($_POST["Acrobatics"])) {
    echo $_POST["Acrobatics"] . "<br />";
} else {
    echo "Acrobatics";
}
if (issset($_POST["Animal Handling"])) {
    echo $_POST["Animal Handling"] . "<br />";
} else {
    echo "Animal Handling";
}
if (issset($_POST["Arcana"])) {
    echo $_POST["Arcana"] . "<br />";
} else {
    echo "Arcana";
}
if (issset($_POST["Athletics"])) {
    echo $_POST["Athletics"] . "<br />";
} else {
    echo "Athletics";
}
if (issset($_POST["Deception"])) {
    echo $_POST["Deception"] . "<br />";
} else {
    echo "Deception";
}
if (issset($_POST["History"])) {
    echo $_POST["History"] . "<br />";
} else {
    echo "History";
}
if (issset($_POST["Insight"])) {
    echo $_POST["Insight"] . "<br />";
} else {
    echo "Insight";
}
if (issset($_POST["Intimidation"])) {
    echo $_POST["Intimidation"] . "<br />";
} else {
    echo "Intimidation";
}
if (issset($_POST["Investigation"])) {
    echo $_POST["Investigation"] . "<br />";
} else {
    echo "Investigation";
}
if (issset($_POST["Medicine"])) {
    echo $_POST["Medicine"] . "<br />";
} else {
    echo "Medicine";
}
if (issset($_POST["Nature"])) {
    echo $_POST["Nature"] . "<br />";
} else {
    echo "Nature";
}
if (issset($_POST["Perception"])) {
    echo $_POST["Perception"] . "<br />";
} else {
    echo "Perception";
}
if (issset($_POST["Performance"])) {
    echo $_POST["Performance"] . "<br />";
} else {
    echo "Performance";
}
if (issset($_POST["Persuasion"])) {
    echo $_POST["Persuasion"] . "<br />";
} else {
    echo "Persuasion";
}
if (issset($_POST["Religion"])) {
    echo $_POST["Religion"] . "<br />";
} else {
    echo "Religion";
}
if (issset($_POST["Sleight of Hand"])) {
    echo $_POST["Sleight of Hand"] . "<br />";
} else {
    echo "Sleight of Hand";
}
if (issset($_POST["Stealth"])) {
    echo $_POST["Stealth"] . "<br />";
} else {
    echo "Stealth";
}
if (issset($_POST["Survival"])) {
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
