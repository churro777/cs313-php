<?php
session_start();
$servername = "ec2-23-23-227-188.compute-1.amazonaws.com";
$username = "mtfkybajvycpzz";
$password = "1f9afc981c3b38e57fe02247902708c1fb4e0014721d9397d4b6a43dc8b1a809";
$dbname = "dc3iv3q4t39i0c";

// Create connection
$conn = pg_connect("host=$servername port=5432 dbname=$dbname user=$username password=$password");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
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

        <link rel="stylesheet" href="../../dndProject/css/dndMain.css">

    </head>
    <body class="container-fluid">
        <div id="rowOfHolding" class="row">
            <!-- leftside bar -->
            <section id="sidebar" class="col-xs-2">
                <!-- logo -->
                <div  class="row space-1">
                    <div class="col-xs-6 col-xs-offset-3">
                        <img src="../../dndProject/img/logo.png" alt="">
                    </div>
                </div>
                <!-- login -->
                <div class="row space-2">
                    <div id="login" class="col-xs-12">Login</div>
                </div>
                <br>
                <!-- characters -->
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
                <form class="form-inline space-4" action="testingRead.php" method="post">
                    <div class="form-group">
                        <label for="email">Type a DnD race to learn about</label>
                        <input type="text" class="form-control" id="race" name="race">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
                <br>
                <br>
                    <?php
                        if (isset($_POST["race"])) {
                            $race = $_POST["race"];
                            $result = pg_query($conn, "SELECT * from race WHERE raceName = '$race' ");
                            while ($row = pg_fetch_array($result)) {
                                //do stuff with $row
                                echo "<h3>$row[1]</h3><br />

                                    <h4>Age</h4>
                                    <p>$row[2]</p><br />

                                    <h4>Alignment</h4>
                                    <p>$row[3]</p><br />

                                    <h4>Size</h4>
                                    <p>$row[4]</p> <br/>";
                            }

                            $otherResults = pg_query($conn, "select featureName, featureDescription from race r inner
                                join raceFeature f on r.id = f.race_id where r.raceName = '$race';");
                                while ($rowFeat = pg_fetch_array($otherResults)) {
                                    //do stuff with $row
                                     echo "<h4>$rowFeat[0]</h4>
                                        <p>$rowFeat[1]</p><br />";
                                }
                        }
                    ?>
            </section>
        </div>

    </body>
</html>
