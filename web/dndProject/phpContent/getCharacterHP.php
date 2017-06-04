<?php
    $sql = 'SELECT maxHP, currentHP FROM character
            WHERE player_id = (SELECT id FROM player WHERE username = :un)
                AND characterName = :c;';
    echo "sql created <br />";
    $statement = $db->prepare($sql);
    echo "prepped <br />";
    $statement->bindParam(':un', $_SESSION["username"], PDO::PARAM_STR);
    $statement->bindParam(':c', $_SESSION["character"], PDO::PARAM_STR);
    echo "bound <br />";
    try {
        $statement->execute();
    } catch (PDOException $ex) {
        echo "Problem getting characters. Details: $ex";
    }
    echo "success!!! <br />";
    $hpResult = $statement->fetch();
    var_dump($hpResult);
?>

<div class="col-xs-4 leftBorder">
    <div class="row">
        <div class="col-xs-6 noPadRight">Max HP</div>
        <?php echo "<input id='maxHP' class='col-xs-5' type='number' name='maxHP' min='0'
            value=" .  $hpResult[0] . " onblur='save('maxHP')'>"; ?>

    </div>
    <div class="row">
        <div class="col-xs-6 noPadRight">Current HP</div>
        <?php echo "<input id='currentHP' class='col-xs-5' type='number' name='currentHP' min='0'
            value=" . $hpResult[1] . "  onblur='save('currentHP')'>" ?>
        
    </div>
</div>
