<?php session_start();
require 'connectToDb.php';
echo "<p>conntected to DB</p>";

echo $_POST["characterName"] . "<br />";
echo $_POST["raceChoice"] . "<br />";
echo $_POST["classChoice"] . "<br />";

$statement = $db->prepare('INSERT INTO character (player_id, charactername, race_id, class_id, level, experience)
                            VALUES ((SELECT id FROM player WHERE username = :un)
                                    :cn,
                                    (SELECT id FROM race WHERE racename = :r),
                                    (SELECT id FROM race WHERE racename = :c),
                                    0, 0);');
$statement->bindParam(':un', $_POST["username"], PDO::PARAM_STR);
$statement->bindParam(':cn', $_POST["characterName"], PDO::PARAM_STR);
$statement->bindParam(':r', $_POST["raceChoice"], PDO::PARAM_STR);
$statement->bindParam(':c', $_POST["classChoice"], PDO::PARAM_STR);

$statement->execute();

header("Location: ../content.php");


?>
