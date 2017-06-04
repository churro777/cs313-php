<?php session_start();

    require 'connectToDb.php';
    
    if (isset($db)){
        echo "db set <br />";
    }


    var_dump($_GET);
    echo "before all teh sql stuff <br />";
    $sql = 'UPDATE character
            SET :col = :val
            WHERE player_id = (SELECT id FROM player WHERE username = :un)
                AND charactername = :c';
    echo "before prepping <br />";
    $statement = $db->prepare($sql);
    echo "prepped <br />";
    $statement->bindParam(':col', $_GET["column"], PDO::PARAM_STR);
    $statement->bindParam(':val', $_GET["value"], PDO::PARAM_STR);
    $statement->bindParam(':un', $_SESSION["username"], PDO::PARAM_STR);
    $statement->bindParam(':c', $_SESSION["character"], PDO::PARAM_STR);
    echo "bound <br />";
    try {
        $statement->execute();
    } catch (PDOException $ex) {
        echo "Problem getting characters. Details: $ex";
    }
    echo "success <br />";

?>
