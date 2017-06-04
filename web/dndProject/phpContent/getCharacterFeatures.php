<?php

    $sql = 'SELECT featurename FROM raceFeature
            WHERE race_id = (SELECT race_id FROM character
                             WHERE charactername = :c
                                 AND player_id = (SELECT id FROM player WHERE username = :un));';
    $statement = $db->prepare($sql);
    $statement->bindParam(':c', $_SESSION["character"], PDO::PARAM_INT);
    $statement->bindParam(':un', $_SESSION["username"], PDO::PARAM_INT);

    try {
        $statement->execute();
    } catch (PDOException $ex) {
        echo "Problem getting characters. Details: $ex";
    }

    $featureResult = $statement->fetchAll();

    var_dump($featureResult);
?>
