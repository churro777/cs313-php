<?php

    $sql = 'SELECT skill, abilityScore FROM skill;';
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


<?php foreach ($variable as $key => $value): ?>


<?php endforeach; ?>
