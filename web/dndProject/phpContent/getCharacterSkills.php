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


<?php foreach ($skillResult as $value): ?>
<div class="row">
    <?php
        $sql = 'SELECT am.modifier FROM character ch
                    INNER JOIN abilityScores a ON ch.id = a.character_id
                    INNER JOIN abilityScoreModifier am ON a.score = am.score
                WHERE ch.charactername = :c
                    AND player_id = (SELECT id FROM player WHERE username = :un)
                    AND a.type = :t;';
        $statement = $db->prepare($sql);
        $statement->bindParam(':c', $_SESSION["character"], PDO::PARAM_INT);
        $statement->bindParam(':un', $_SESSION["username"], PDO::PARAM_INT);
        $statement->bindParam(':t', $value["abilityscore"], PDO::PARAM_INT);
        try {
            $statement->execute();
        } catch (PDOException $ex) {
            echo "Problem getting ability score modifier. Details: $ex";
        }
        $modResult = $statement->fetch();
    ?>
    <div class="col-xs-8"><?php echo $value["skill"]; ?></div>
    <div class="col-xs-2"><?php echo $value["abilityscore"]; ?></div>
    <div class="col-xs-2">
        <?php if ($modResult[0] >= 0){
                echo "+" . $modResult[0];
            }else {
                echo $modResult[0];
            }?>
    </div>
</div>
<hr>

<?php endforeach; ?>
