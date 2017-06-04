<?php

    $sql = 'SELECT type, score FROM abilityScores
            WHERE character_id = (SELECT id FROM character
                                  WHERE charactername = :c
                                  AND player_id = (SELECT id FROM player WHERE username = :un));';
    $statement = $db->prepare($sql);

    $statement->bindParam(':c', $_SESSION["character"], PDO::PARAM_STR);
    $statement->bindParam(':un', $_SESSION["username"], PDO::PARAM_STR);

    try {
        $statement->execute();
    } catch (PDOException $ex) {
        echo "Problem getting characters. Details: $ex";
    }
    $scoreResult = $statement->fetchAll();

?>

<div class="row">
    <?php foreach ($scoreResult as $value): ?>
        <?php
        $sql = 'SELECT modifier FROM abilityScoreModifier
                WHERE score = :x';
        $statement = $db->prepare($sql);

        $statement->bindParam(':x', $value[1], PDO::PARAM_INT);

        try {
            $statement->execute();
        } catch (PDOException $ex) {
            echo "Problem getting ability score modifier. Details: $ex";
        }
        $modResult = $statement->fetch();
        var_dump($modResult);
        ?>
        <div class="col-xs-2">
            <div class="abilityScoreBox center">
                <?php echo $value[0] ?>
                <br />
                <?php echo $value[1] ?> (<?php echo $modResult[0] ?>)
            </div>
        </div>
    <?php endforeach; ?>
</div>
