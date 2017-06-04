<?php session_start(); require 'php/connectToDb.php';

var_dump($_SESSION);

if (!isset($_SESSION["username"])) {
    header("Location: index.php");
}

// if no character is presently chosen to be displayed
if (!isset($_SESSION["character"])) {
    // query the players chracters
    $sql = 'SELECT charactername FROM character
            WHERE player_id = (SELECT id FROM player WHERE username = :un);';
    $statement = $db->prepare($sql);
    $statement->bindParam(':un', $_SESSION["username"], PDO::PARAM_STR);

    try {
        $statement->execute();
    } catch (PDOException $ex) {
        echo "Problem getting characters. Details: $ex";
    }
    // set the first one to be displayed
    $_SESSION["character"] = $statement->fetch()[0];
    // If player has no characters saved, then set noCharacters to true
    if(!isset($_SESSION["character"])){
        $_SESSION["noCharacters"] = true;
    } else {
        // otherwise unset noCharacters. Don't want it activating when it shouldnt be
        unset($_SESSION["noCharacters"]);
    }
}

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
            <!-- if the player has no characters saved then tell them to make a character -->
            <?php if ($_SESSION["noCharacters"]): ?>
            <section class="col-xs-10">
                <div class="row" style="margin-top:20%">
                    <h2 class="col-xs-12 center">Hey <?php echo $_SESSION["username"] ?>, you should make a character.
                        <br />It's easy. Just click on the New Character box on the left.</h2>
                </div>
            </section>
            <!-- get rid of this variable now that we dont need it -->
            <?php unset($_SESSION["noCharacters"]); ?>
            <!-- the following will occur if the player has at least one character saved -->
            <?php else: ?>
            <!-- content -->
            <section id="content" class="col-xs-10">
                <!-- name and race and class -->
                <?php require 'phpContent/getCharacterInfo.php' ?>
                <hr>
                <!-- abiilty scores and modifiers -->
                <div id="" class="row">
                    <?php require 'phpContent/getCharacterAbilityScores.php' ?>
                </div>
                <hr />
                <div class="row">
                    <!-- left section -->
                    <section id="leftSide" class="col-xs-6">
                        <div class="row">
                            <!-- hp -->
                            <div class="col-xs-4">
                                <div class="row">
                                    <div class="col-xs-7">Max HP</div>
                                    <input class="col-xs-5" type="number" name="maxHP" value="1">
                                </div>
                                <div class="row">
                                    <div class="col-xs-7">Current HP</div>
                                    <input class="col-xs-5" type="number" name="currentHP" value="1">
                                </div>
                            </div>

                            <!-- hit dice - total and how many left -->
                            <?php require 'phpContent/getCharacterHitDice.php' ?>
                            <!-- ac -->
                            <div class="col-xs-4">
                                <div class="row">
                                    <div class="col-xs-6">AC</div>
                                </div>
                                <input class="col-xs-6" type="text" name="" value="">
                            </div>
                        </div>
                        <hr>
                        <!-- skills and modifiers for each -->
                        <div class="row">
                            <div class="col-xs-12">

                            </div>
                        </div>
                    </section>


                    <!-- right section -->
                    <section class="col-xs-6">
                        <!-- features -->
                    </section>

                </div>
            </section>
            <?php endif; ?>
        </div>

    </body>
</html>
