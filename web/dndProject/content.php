<?php session_start(); require 'php/connectToDb.php';

var_dump($_SESSION);

if (!isset($_SESSION["username"])) {
    header("Location: index.php");
}

if (!isset($_SESSION["character"])) {
    $sql = 'SELECT charactername FROM character
            WHERE player_id = (SELECT id FROM player WHERE username = :un);';
    $statement = $db->prepare($sql);
    $statement->bindParam(':un', $_SESSION["username"], PDO::PARAM_STR);

    try {
        $statement->execute();
    } catch (PDOException $ex) {
        echo "Problem getting characters. Details: $ex";
    }
    $_SESSION["character"] = $statement->fetch()[0];
}

echo "character = " . $_SESSION["character"];

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="img/logoIcon.ico" type="image/gif" sizes="16x16">
        <title>DnD Character Creator Template</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
            integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
            integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>

        <link rel="stylesheet" href="css/dndMain.css">
        <link rel="stylesheet" href="css/basic.css">

    </head>
    <body class="container-fluid">
        <!-- The Row of Holding holds everything on the page -->
        <div id="rowOfHolding" class="row">
            <!-- leftside bar -->
            <section id="sidebar" class="col-xs-2">
                <!-- logo -->
                <div  class="row space-1">
                    <div class="col-xs-6 col-xs-offset-3">
                        <img src="img/logo.png" alt="">
                    </div>
                </div>
                <div class="row newCharacterRow">
                    <a href="creator_1_character.php" id="newCharacterLink"
                        class="center col-xs-12 space-2">New Character</a>
                </div>
                <hr>
                <!-- generate the characters the user has -->
                <?php require 'phpContent/getCharacters.php' ?>
            </section>
            <!-- content -->
            <section id="content" class="col-xs-10">
                <!-- name and race and class -->
                <div class="row">
                    <div id="characterName" class="col-xs-8">Jonny Smithersonson</div>
                    <div class="col-xs-4">
                        <div id="levelClassRaceContainer" class="row">
                            <div class="col-xs-4 center">Level 5</div>
                            <div class="col-xs-8 center">Half-Orc Barbarian</div>
                        </div>
                    </div>
                </div>
                <hr>
                <!-- abiilty scores and modifiers -->
                <div id="" class="row">
                    <div class="col-xs-2 center">
                        <div class="abilityScoreBox">
                            STR <br /> 19 (+4)
                        </div>
                    </div>
                    <div class="col-xs-2 center">
                        <div class="abilityScoreBox">
                            DEX <br /> 19 (+4)
                        </div>
                    </div>
                    <div class="col-xs-2 center">
                        <div class="abilityScoreBox">
                            CON <br /> 19 (+4)
                        </div>
                    </div>
                    <div class="col-xs-2 center">
                        <div class="abilityScoreBox">
                            INT <br /> 19 (+4)
                        </div>
                    </div>
                    <div class="col-xs-2 center">
                        <div class="abilityScoreBox">
                            WIS <br /> 19 (+4)
                        </div>
                    </div>
                    <div class="col-xs-2 center">
                        <div class="abilityScoreBox">
                            CHA <br /> 19 (+4)
                        </div>
                    </div>
                </div>
                <!-- left section -->
                    <!-- hp -->
                    <!-- hit dice - total and how many left -->
                    <!-- ac -->
                    <!-- skills and modifiers for each -->

                <!-- right section -->
                <!-- features -->
            </section>
        </div>

    </body>
</html>
