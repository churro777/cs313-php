<?php
    $sql = 'SELECT 
            WHERE ch.player_id = (SELECT id FROM player WHERE username = :un)
                AND ch.characterName = :c;';
    $statement = $db->prepare($sql);
    $statement->bindParam(':un', $_SESSION["username"], PDO::PARAM_STR);
    $statement->bindParam(':c', $_SESSION["character"], PDO::PARAM_STR);
    try {
        $statement->execute();
    } catch (PDOException $ex) {
        echo "Problem getting characters. Details: $ex";
    }
    $hitDiceResult = $statement->fetch();
?>

<div class="col-xs-4 leftBorder">
    <div class="row">
        <div class="col-xs-6 noPadRight">Max HP</div>
        <input id="maxHP" class="col-xs-5" type="number" name="maxHP" min="0" onblur="save('maxHP')">
    </div>
    <div class="row">
        <div class="col-xs-6 noPadRight">Current HP</div>
        <input id="currentHP" class="col-xs-5" type="number" name="currentHP" min="0"  onblur="save('currentHP')">
    </div>
</div>
