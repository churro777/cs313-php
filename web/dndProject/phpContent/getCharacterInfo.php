<?php
    $sql = 'SELECT ch.charactername, ch.level, race.racename, class.classname
            FROM character ch
                INNER JOIN race ON ch.race_id = race.id
                INNER JOIN class ON ch.class_id = class.id
            WHERE charactername = :c
                AND player_id = (SELECT id FROM player WHERE username = :un);';
    $statement = $db->prepare($sql);
    $statement->bindParam(':un', $_SESSION["username"], PDO::PARAM_STR);
    $statement->bindParam(':c', $_SESSION["character"], PDO::PARAM_STR);

    try {
        $statement->execute();
    } catch (PDOException $ex) {
        echo "Problem getting characters. Details: $ex";
    }

    $scoreResult = $statement->fetch();

    // will be used for hitdicetype
    $_SESSION["level"] = $scoreResult[1];
?>

<div class="row" style="height: 22vh;">
    <div id="characterName" class="col-xs-7"><?php echo $scoreResult[0];?></div>
    <div class="col-xs-5">
        <div id="levelClassRaceContainer" class="row">
            <div class="col-xs-4 center">Level <?php echo $scoreResult[1];?></div>
            <div class="col-xs-8 center"><?php echo $scoreResult[2];?> <?php echo $scoreResult[3];?></div>
        </div>
    </div>
</div>
