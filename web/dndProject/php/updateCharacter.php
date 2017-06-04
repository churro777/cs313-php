<?php session_start();

    var_dump($_GET);

    $sql = 'UPDATE character
            SET :col = :val
            WHERE player_id = (SELECT id FROM player WHERE username = :un)
                AND charactername = :c';
    $statement = $db->prepare($sql);

    $statement->bindParam(':col', $_GET["column"], PDO::PARAM_STR);
    $statement->bindParam(':val', $_GET["value"], PDO::PARAM_STR);
    $statement->bindParam(':un', $_SESSION["username"], PDO::PARAM_STR);
    $statement->bindParam(':c', $_SESSION["character"], PDO::PARAM_STR);

    try {
        $statement->execute();
    } catch (PDOException $ex) {
        echo "Problem getting characters. Details: $ex";
    }

?>
