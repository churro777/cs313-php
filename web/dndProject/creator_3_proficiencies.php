<?php session_start();
    require 'php/connectToDb.php';
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
            <p class="col-xs-12 center">Proficiencies - Next let's figure our your character's Proficiencies. Or in
                other words what your character is really good at.</p>
        </div>

        <div class="row">

            <div class="createBox col-xs-8 col-xs-offset-2 space-4">
                <form id="createProficiencies" action="php/createCharacter3.php" method="post">
                    <div class="form-group col-xs-12 space-2">
                        <label for="characterName" class="creatorLabel">Let's get
                            <?php echo $_SESSION["character"];?>'s Proficiencies
                        </label>
                    </div>

                    <?php
                        echo "before prepare <br />";

                        if(!($statement = $db->prepare('SELECT abilityScore, increase FROM raceabilityscoreincrease
                                                    WHERE race_id = (SELECT id FROM race WHERE racename = :rn);'))) {
                            echo "Prepare failed: (" . $db->errno . ") " . $db->error;
                        } else {
                            echo "worked???";
                        }


                        echo "prepared <br />";
                        $statement->bindParam(':cn', $_SESSION["class"], PDO::PARAM_STR);
                        $class = "class";
                        $statement->bindParam(':c', $class, PDO::PARAM_STR);
                        echo "prepared <br />";
                        try {
                            echo "about to execute <br />";
                            $statement->execute();
                        } catch (PDOException $ex) {
                            echo "Problem getting characters. Details: $ex";
                        }
                        echo "success!!";
                        $scoreResult = $statement->fetchAll();
                    ?>
                    <div class="row white" style="padding:0 15px;">
                        <div class="col-xs-12">Because of your character's class, <?php echo $_SESSION["class"];?>, you
                            can choose from the following proficiencies:</div>
                    </div>
                    <div class="row white" style="padding:0 15px;">
                        <div class="col-xs-12">
                            <ul>
                                <?php //foreach ($scoreResult as $scoreRow): ?>
                                    <li><?php //echo $scoreRow[0];?></li>
                                <?php //endforeach; ?>
                            </ul>
                        </div>
                    </div>


                    <div class="form-group col-xs-12">
                        <label class="creatorLabel">Proficiencies</label>
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="checkbox">
                                    <label><input type="checkbox" value="Acrobatics" name="Acrobatics">Acrobatics (Dex)</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="Animal Handling" name="Animal Handling">Animal Handling (Wis)</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="Arcana" name="Arcana">Arcana (Int)</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="Athletics" name="Athletics">Athletics (Str)</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="Deception" name="Deception">Deception (Cha)</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="History" name="History">History (Int)</label>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="checkbox">
                                    <label><input type="checkbox" value="Insight" name="Insight">Insight (Wis)</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="Intimidation" name="Intimidation">Intimidation (Cha)</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="Investigation" name="Investigation">Investigation (Int)</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="Medicine" name="Medicine">Medicine (Wis)</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="Nature" name="Nature">Nature (Int)</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="Perception" name="Perception">Perception (Wis)</label>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="checkbox">
                                    <label><input type="checkbox" value="Performance" name="Performance">Performance (Cha)</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="Persuasion" name="Persuasion">Persuasion (Cha)</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="Religion" name="Religion">Religion (Int)</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="Sleight of Hand" name="SleightHand">Sleight of Hand (Dex)</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="Stealth" name="Stealth">Stealth (Dex)</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="Survival" name="Survival">Survival (Wis)</label>
                                </div>
                            </div>
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
