<?php session_start();

    require 'connectToDb.php';

    if (isset($db)){
        echo "db set <br />";
    }


    var_dump($_GET);
    echo "before all teh sql stuff <br />";

    echo $_GET["column"] . "<br />";
    echo $_GET["value"] . "<br />";

    $sql = 'UPDATE character
            SET :col = :val
            WHERE player_id = (SELECT id FROM player WHERE username = :un)
                AND charactername = :c ;';
    echo "before prepping <br />";
    $statement = $db->prepare($sql);
    echo "prepped <br />";
    $statement->bindParam(':col', $_GET["column"], PDO::PARAM_STR);
    $statement->bindParam(':val', $_GET["value"], PDO::PARAM_STR);
    $statement->bindParam(':un', $_SESSION["username"], PDO::PARAM_STR);
    $statement->bindParam(':c', $_SESSION["character"], PDO::PARAM_STR);
    echo "bound <br />";
    var_dump($statement);
    try {
        $statement->execute();
    } catch (PDOException $ex) {
        echo "Problem updating characters. Details: $ex";
    }
    echo "success <br />";

?>
