<?php

    $sql = 'SELECT skill, abilityScore FROM skill;';
    $statement = $db->prepare($sql);

    try {
        $statement->execute();
    } catch (PDOException $ex) {
        echo "Problem getting characters. Details: $ex";
    }

    $skillResult = $statement->fetchAll();

?>
