<?php session_start();

    $sql = 'SELECT featurename,featuredescription FROM raceFeature
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

?>
<?php if (!empty($featureResult)): ?>
    <div class="row">
        <h3 class="col-xs-12">Race Features</h3>
    </div>
    <hr>
<?php endif; ?>

<?php foreach ($featureResult as $value): ?>
    <div class="row">
        <b class="col-xs-12"><?php echo $value[0]; ?></b>
    </div>
    <div class="row">
        <div class="col-xs-12"><?php echo $value[1]; ?></div>
    </div>
    <hr>
<?php endforeach; ?>




<?php

    $sql = 'SELECT featurename, featureText FROM classFeature
            WHERE class_id = (SELECT class_id FROM character
                              WHERE charactername = :c
                                  AND player_id = (SELECT id FROM player WHERE username = :un))
                AND level <= (SELECT level FROM character
                              WHERE charactername = :c
                                  AND player_id = (SELECT id FROM player WHERE username = :un))
            ORDER BY level;';
    $statement = $db->prepare($sql);
    $statement->bindParam(':c', $_SESSION["character"], PDO::PARAM_INT);
    $statement->bindParam(':un', $_SESSION["username"], PDO::PARAM_INT);

    try {
        $statement->execute();
    } catch (PDOException $ex) {
        echo "Problem getting characters. Details: $ex";
    }

    $featureResult = $statement->fetchAll();
?>

<div class="row">
    <h3 class="col-xs-12">Class Features</h3>
</div>
<hr>

<?php foreach ($featureResult as $value): ?>
    <div class="row">
        <b class="col-xs-12"><?php echo $value[0]; ?></b>
    </div>
    <div class="row">
        <div class="col-xs-12"><?php echo $value[1]; ?></div>
    </div>
    <hr>
<?php endforeach; ?>
