<?php
    //require '../php/connectToDb.php';
    echo "inside getCharacterAbilityScores <br />";
    $sql = 'SELECT type, score FROM abilityScores
            WHERE character_id = (SELECT id FROM character
                                  WHERE charactername = :c
                                  AND player_id = (SELECT id FROM player WHERE username = :un));';
    $statement = $db->prepare($sql);

    $statement->bindParam(':c', $_SESSION["character"], PDO::PARAM_STR);
    $statement->bindParam(':un', $_SESSION["username"], PDO::PARAM_STR);

    echo "prepared and bound <br />";
    try {
        $statement->execute();
    } catch (PDOException $ex) {
        echo "Problem getting characters. Details: $ex";
    }
    echo "executed successfully <br />";
    $scoreResult = $statement->fetchAll();
    echo "scoreResult = " . $scoreResult . "<br />";
    echo $scoreResult[0] . "<br />";
    echo $scoreResult[1] . "<br />";
    echo $scoreResult[2] . "<br />";
?>


<div class="row">
    <?php foreach ($scoreResult as $value): ?>
        <div class="col-xs-2">
            <div class="abilityScoreBox">
                <?php echo $value[0] ?>
                <br />
                <?php echo $value[0] ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>
