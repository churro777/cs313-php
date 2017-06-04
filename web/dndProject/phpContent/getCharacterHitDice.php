<?php
    $sql = 'SELECT cl.hitdicetype FROM character ch
                INNER JOIN class cl ON ch.class_id = cl.id
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

<div class="col-xs-4"><?php echo $hitDiceResult[0] ?></div>
