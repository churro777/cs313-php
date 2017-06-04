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
    <?php
        echo "inside php <br />";
        $sql = 'SELECT * FROM character ch
                    INNER JOIN abilityScores a ON ch.id = a.character_id
                    INNER JOIN abilityScoreModifier am ON a.score = am.score
                WHERE ch.charactername = :c
                    AND player_id = (SELECT id FROM player WHERE username = :un)
                    AND a.type = :t;';
        $statement = $db->prepare($sql);
        echo "preped <br />";
        $statement->bindParam(':c', $_SESSION["character"], PDO::PARAM_INT);
        $statement->bindParam(':un', $_SESSION["username"], PDO::PARAM_INT);
        $statement->bindParam(':t', $value["abilityscore"], PDO::PARAM_INT);
        echo "bound <br />";
        try {
            $statement->execute();
        } catch (PDOException $ex) {
            echo "Problem getting ability score modifier. Details: $ex";
        }
        echo "success!! <br />";
        $modResult = $statement->fetch();
        var_dump($modResult);
    ?>
    <div class="col-xs-8"><?php echo $value["skill"]; ?></div>
</div>

<?php endforeach; ?>


<!-- array(18) { [0]=> array(4) { ["skill"]=> string(10) "Acrobatics"
                             [0]=> string(10) "Acrobatics"
                             ["abilityscore"]=> string(3) "DEX"
                             [1]=> string(3) "DEX" }
            [1]=> array(4) { ["skill"]=> string(15) "Animal Handling"
                             [0]=> string(15) "Animal Handling"
                             ["abilityscore"]=> string(3) "WIS"
                             [1]=> string(3) "WIS" }
            [2]=> array(4) { ["skill"]=> string(6) "Arcana"
                             [0]=> string(6) "Arcana"
                             ["abilityscore"]=> string(3) "INT"
                             [1]=> string(3) "INT" }
            [3]=> array(4) { ["skill"]=> string(9) "Athletics"
                             [0]=> string(9) "Athletics"
                             ["abilityscore"]=> string(3) "STR"
                             [1]=> string(3) "STR" }
            [4]=> array(4) { ["skill"]=> string(9) "Deception"
                             [0]=> string(9) "Deception"
                             ["abilityscore"]=> string(3) "CHA"
                             [1]=> string(3) "CHA" }
            [5]=> array(4) { ["skill"]=> string(7) "History" [0]=> string(7) "History" ["abilityscore"]=> string(3) "INT" [1]=> string(3) "INT" }
            [6]=> array(4) { ["skill"]=> string(7) "Insight" [0]=> string(7) "Insight" ["abilityscore"]=> string(3) "WIS" [1]=> string(3) "WIS" }
            [7]=> array(4) { ["skill"]=> string(12) "Intimidation" [0]=> string(12) "Intimidation" ["abilityscore"]=> string(3) "CHA" [1]=> string(3) "CHA" }
            [8]=> array(4) { ["skill"]=> string(13) "Investigation" [0]=> string(13) "Investigation" ["abilityscore"]=> string(3) "INT" [1]=> string(3) "INT" }
            [9]=> array(4) { ["skill"]=> string(8) "Medicine" [0]=> string(8) "Medicine" ["abilityscore"]=> string(3) "WIS" [1]=> string(3) "WIS" }
            [10]=> array(4) { ["skill"]=> string(6) "Nature" [0]=> string(6) "Nature" ["abilityscore"]=> string(3) "INT" [1]=> string(3) "INT" }
            [11]=> array(4) { ["skill"]=> string(10) "Perception" [0]=> string(10) "Perception" ["abilityscore"]=> string(3) "WIS" [1]=> string(3) "WIS" }
            [12]=> array(4) { ["skill"]=> string(11) "Performance" [0]=> string(11) "Performance" ["abilityscore"]=> string(3) "CHA" [1]=> string(3) "CHA" }
            [13]=> array(4) { ["skill"]=> string(10) "Persuasion" [0]=> string(10) "Persuasion" ["abilityscore"]=> string(3) "CHA" [1]=> string(3) "CHA" }
            [14]=> array(4) { ["skill"]=> string(8) "Religion" [0]=> string(8) "Religion" ["abilityscore"]=> string(3) "INT" [1]=> string(3) "INT" } [15]=> array(4) { ["skill"]=> string(15) "Sleight of Hand" [0]=> string(15) "Sleight of Hand" ["abilityscore"]=> string(3) "DEX" [1]=> string(3) "DEX" } [16]=> array(4) { ["skill"]=> string(7) "Stealth" [0]=> string(7) "Stealth" ["abilityscore"]=> string(3) "DEX" [1]=> string(3) "DEX" } [17]=> array(4) { ["skill"]=> string(8) "Survival" [0]=> string(8) "Survival" ["abilityscore"]=> string(3) "WIS" [1]=> string(3) "WIS" } } -->
