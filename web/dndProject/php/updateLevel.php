<?php session_start();

    require 'connectToDb.php';

    var_dump($_GET);
    echo "before all teh sql stuff <br />";



    echo $_GET["level"] . "<br />";
    echo $_GET["type"] . "<br />";
    echo $_SESSION["username"] . "<br />";
    echo $_SESSION["character"] . "<br />";





    if ($_GET["type"] == "increase") {
        echo "lets increase <br />";
        $newLevel = $_GET["level"] + 1;

        echo "newlevel - " . $newLevel . "<br />";
    }

    if ($_GET["type"] == "decrease") {
        echo "lets decrease<br />";
        $newLevel = $newLevel - 1;
        if ($newLevel <= 0) {
            echo "bad <br />";
            header("Location: ../content.php");
        }
        echo "newlevel - " . $newLevel . "<br />";
    }

    echo "lets now do stuff <br />";
    // $sql = 'UPDATE character
    //         SET :col = :val
    //         WHERE player_id = (SELECT id FROM player WHERE username = :un)
    //             AND charactername = :c ;';
    //
    // echo "before prepping <br />";
    // $statement = $db->prepare($sql);
    // echo "prepped <br />";
    // $statement->bindParam(':col', $_GET["column"], PDO::PARAM_STR);
    // $statement->bindParam(':val', $_GET["value"], PDO::PARAM_STR);
    // $statement->bindParam(':un', $_SESSION["username"], PDO::PARAM_STR);
    // $statement->bindParam(':c', $_SESSION["character"], PDO::PARAM_STR);
    // echo "bound <br />";
    // var_dump($statement);
    // try {
    //     $statement->execute();
    // } catch (PDOException $ex) {
    //     echo "Problem updating characters. Details: $ex";
    // }
    // echo "success <br />";

    //header("Location: ../content.php");

?>
