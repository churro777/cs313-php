<?php session_start();
require 'connectToDb.php';

$statement = $db->prepare('INSERT INTO character (player_id, charactername, race_id, class_id, level, experience)
                            VALUES ((SELECT id FROM player WHERE username = :un),
                                    :cn,
                                    (SELECT id FROM race WHERE racename = :r),
                                    (SELECT id FROM class WHERE classname = :c),
                                    1, 1);');

$statement->bindParam(':un', $_SESSION["username"], PDO::PARAM_STR);
$statement->bindParam(':cn', $_POST["characterName"], PDO::PARAM_STR);
$statement->bindParam(':r', $_POST["raceChoice"], PDO::PARAM_STR);
$statement->bindParam(':c', $_POST["classChoice"], PDO::PARAM_STR);

try {
    $statement->execute();
} catch (PDOException $ex) {
    echo "Problem inserting character. Details: $ex";
}





header("Location: ../creator_2_scores.php");

?>
