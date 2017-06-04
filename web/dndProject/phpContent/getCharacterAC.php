<?php
    $sql = 'SELECT maxHP, currentHP FROM character
            WHERE player_id = (SELECT id FROM player WHERE username = :un)
                AND characterName = :c;';
    $statement = $db->prepare($sql);
    $statement->bindParam(':un', $_SESSION["username"], PDO::PARAM_STR);
    $statement->bindParam(':c', $_SESSION["character"], PDO::PARAM_STR);
    try {
        $statement->execute();
    } catch (PDOException $ex) {
        echo "Problem getting characters. Details: $ex";
    }
    $acResult = $statement->fetch();
?>

<div class="col-xs-4">
    <div class="row space-2">
        <div class="col-xs-5 center" style="font-size:20px;">AC</div>
        <?php echo "<input id='ac' class='col-xs-5' type='number' name='ac' min='0' value='"
            . $acResult[0] . "onblur='save('ac')'>" ?>

    </div>
</div>
