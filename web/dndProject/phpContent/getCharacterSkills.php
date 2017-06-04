<?php

    $sql = 'SELECT skill, abilityScore FROM skill;';
    $statement = $db->prepare($sql);

    try {
        $statement->execute();
    } catch (PDOException $ex) {
        echo "Problem getting characters. Details: $ex";
    }

    $skillResult = $statement->fetchAll();

    var_dump($skillResult);
?>


<?php foreach ($skillResult as $value): ?>
<div class="row">
    <div class="col-xs-8"><?php echo $value; ?></div>
</div>

<?php endforeach; ?>
