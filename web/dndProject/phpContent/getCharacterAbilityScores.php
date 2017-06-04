<?php
    $sql = 'SELECT type, score FROM abilityScores
            WHERE charactername = :c';
    $statement = $db->prepare($sql);
    $statement->bindParam(':un', $_SESSION["username"], PDO::PARAM_STR);
    $statement->bindParam(':c', $_SESSION["character"], PDO::PARAM_STR);

    try {
        $statement->execute();
    } catch (PDOException $ex) {
        echo "Problem getting characters. Details: $ex";
    }

    $scoreResult = $statement->fetch();
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
