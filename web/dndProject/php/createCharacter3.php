<?php session_start();
echo "inside createCharacter3.php <br />";
// connect to the database
require 'connectToDb.php';
echo "connected to db <br />";

echo "<br /> <br /> <br />";
var_dump($_POST);
echo "<br /> <br /> <br />";


foreach ($_POST as $value) {
    echo "<br /><br /><br /><br />" . $value . "<br />";
    $sql = 'INSERT INTO characterProficiency (character_id, skill)
            VALUES ((SELECT id FROM character WHERE charactername = :cn), :skill);';
    echo "before prepare <br />";
    try {
        $statement = $db->prepare($sql);
    } catch (PDOException $ex) {
        echo "<br />Problem preparing statement. Details: $ex";
    }
    echo "prepared about to bound <br />";
    $statement->bindParam(':cn', $_SESSION["character"], PDO::PARAM_STR);
    $statement->bindParam(':skill', $value, PDO::PARAM_STR);
    echo "bound, about to execute <br />";
    try {
        $statement->execute();
    } catch (PDOException $ex) {
        echo "<br />Problem inserting proficiency $value. Details: $ex";
    }
    echo "success <br />";


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
