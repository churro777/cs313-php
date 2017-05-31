<?php session_start();
// make sure the login is good. this shouldn't ever happen but just in case
if($_SESSION["badLogin"] == "true"){
    header("Location: ../index.php");
}

// require 'php/connectToDb.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
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
                    <a href="phhpContent/characterCreation.php" id="newCharacterLink"
                        class="center col-xs-12 space-2">New Character</a>
                </div>
                <hr>



                <!-- characters -->
                <!-- will be replaced by php require 'getCharacters.php' -->
                <?php //require 'getCharacters.php' ?>
                <div class="row characterRow">
                    <a class="col-xs-12">Geroth Kadik</a>
                </div>
                <hr>
                <div class="row characterRow">
                    <a class="col-xs-12">Contin Strult</a>
                </div>
                <hr>
                <div class="row characterRow">
                    <a class="col-xs-12">Astor Fasim</a>
                </div>



            </section>
            <!-- content -->
            <section id="content" class="col-xs-10">
                <!-- name and race and class -->
                <div class="row">
                    <div id="characterName" class="col-xs-8">Jonny Smithersonson</div>
                    <div class="col-xs-4">
                        <div class="row">
                            <div class="col-xs-12 center">Level 5</div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 center">Half-Orc Barbarian</div>
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
