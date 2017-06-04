<?php session_start();
// connect to the database
require 'connectToDb.php';

// this for loop should insert every value from the previous page
foreach ($_POST as $value) {
    $sql = 'INSERT INTO characterProficiency (character_id, skill)
            VALUES ((SELECT id FROM character WHERE charactername = :cn), :skill);';

    // prepare the previous statment
    try {
        $statement = $db->prepare($sql);
    } catch (PDOException $ex) {
        echo "<br />Problem preparing statement. Details: $ex";
    }

    // bind the character and proficiency of the current loop
    $statement->bindParam(':cn', $_SESSION["character"], PDO::PARAM_STR);
    $statement->bindParam(':skill', $value, PDO::PARAM_STR);

    // try to execute the prepared statement
    try {
        $statement->execute();
    } catch (PDOException $ex) {
        echo "<br />Problem inserting proficiency $value. Details: $ex";
    }
}

// send the user to the content page
header("Location: ../content.php");

?>
