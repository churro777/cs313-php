<?php session_start();
    require 'php/connectToDb';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="img/logoIcon.ico" type="image/gif" sizes="16x16">
        <title>Ashardalon - Create a New Character</title>
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

        <div class="row space-1">
            <div class="col-xs-1">
                <img src="img/logo.png" alt="">
            </div>
            <h1 class="col-xs-10 center">Ashardalon Character Creator</h1>
            <div class="col-xs-1">
                <img src="img/logo.png" alt="">
            </div>
        </div>
        <div class="row">
            <p class="col-xs-12 center">Next let's figure our your character's Ability Scores.</p>
        </div>

        <div class="row">

            <div id="loginBox" class="col-xs-8 col-xs-offset-2 space-4">
                <form id="loginForm" action="php/createCharacter2.php" method="post">
                    <div class="form-group col-xs-12 space-2">
                        <label for="characterName" class="creatorLabel">Let's get
                            <?php echo $_SESSION["character"];?>'s Ability Scores
                        </label>
                    </div>
                    <div class="form-group col-xs-12">
                        <label class="creatorLabel">Ability Scores  -
                            <a href="scores.php" class="white">How to generate Ability Scores</a>
                        </label>
                        <div class="row">
                            <div class="col-xs-2">
                                <label for="str" class="creatorLabel">STR</label>
                                <input type="number" class="form-control" id="str" name="str" value="10" min="1" max="20">
                            </div>
                            <div class="col-xs-2">
                                <label for="str" class="creatorLabel">DEX</label>
                                <input type="number" class="form-control" id="dex" name="dex" value="10" min="1" max="20">
                            </div>
                            <div class="col-xs-2">
                                <label for="str" class="creatorLabel">CON</label>
                                <input type="number" class="form-control" id="con" name="con" value="10" min="1" max="20">
                            </div>
                            <div class="col-xs-2">
                                <label for="str" class="creatorLabel">INT</label>
                                <input type="number" class="form-control" id="int" name="int" value="10" min="1" max="20">
                            </div>
                            <div class="col-xs-2">
                                <label for="str" class="creatorLabel">WIS</label>
                                <input type="number" class="form-control" id="wis" name="wis" value="10" min="1" max="20">
                            </div>
                            <div class="col-xs-2">
                                <label for="str" class="creatorLabel">CHA</label>
                                <input type="number" class="form-control" id="cha" name="cha" value="10" min="1" max="20">
                            </div>
                        </div>
                    </div>

                    <?php
                        // $statement = $db->prepare('SELECT abilityScore, increase FROM raceabilityscoreincrease
                        //                             WHERE race_id = (SELECT id FROM race WHERE racename = :rn);');
                        // $statement->bindParam(':rn', $_SESSION["race"], PDO::PARAM_STR);
                        //
                        // try {
                        //     $statement->execute();
                        // } catch (PDOException $ex) {
                        //     echo "Problem getting characters. Details: $ex";
                        // }
                        //
                        // $scoreResult = $statement->fetchAll();
                    ?>
                    <div class="row">
                        <div class="col-xs-12">Because of your race, <?php echo $_SESSION["race"];?>, you can
                            increase the following scores after generating them.</div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-xs-12">
                            <ul>
                                <?php //foreach ($scoreResult as $scoreRow): ?>
                                    <li>Increase <?php //echo $scoreRow[0];?> by <?php //echo $scoreRow[1];?></li>
                                <?php //endforeach; ?>
                            </ul>
                        </div>
                    </div> -->


                    <div class="row">
                        <div class="col-xs-12">

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <button type="submit" class="btn btn-default col-xs-4 col-xs-offset-4 space-3">Next</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </body>
</html>
