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

                    <?php $statement = $db->prepare('SELECT skill FROM classSkillProf
                                                    WHERE class_id = (SELECT id FROM class WHERE classname = :cn);');
                        $statement->bindParam(':cn', $_SESSION["class"], PDO::PARAM_STR);

                        try {
                            $statement->execute();
                        } catch (PDOException $ex) {
                            echo "Problem getting characters. Details: $ex";
                        }
                        $scoreResult = $statement->fetchAll();
                    ?>
                    <!-- tell the user how many choices they can choose -->
                    <div class="row white" style="padding:0 15px;">
                        <div class="col-xs-12">Because of your character's class, <?php echo $_SESSION["class"];?>, you
                            can choose <?php if ($_SESSION["class"] == "Bard" || $_SESSION["class"] == "Ranger") {
                                echo "3";
                            } elseif ($_SESSION["Rogue"]) {
                                echo "4";
                            } else {
                                echo "2";
                            }?> from the following proficiencies:</div>
                    </div>

                    <div class="form-group col-xs-12">
                        <label class="creatorLabel">Proficiencies</label>
                        <div class="row">
                            <div class="col-xs-4">
                                <?php foreach ($scoreResult as $scoreRow): ?>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="<?php echo $scoreRow[0];?>"
                                            name="<?php echo $scoreRow[0];?>"><?php echo $scoreRow[0];?></label>
                                    </div>
                                <?php endforeach; ?>
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
