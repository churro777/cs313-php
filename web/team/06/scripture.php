<?php

$user = 'jim';
$password = 'password123';

$db = new PDO('pgsql:host=localhost;dbname=arturoaguila', $user, $password);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
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
    </head>
    <body class="container-fluid">
        <form class="form-inline" action="input.php" method="post">
            <div class="form-group">
                <label class="col-xs-5" for="book">Book</label>
                <input type="text" class="col-xs-7 form-control" name="book" id="book">
            </div>
            <br>
            <div class="form-group">
                <label class="col-xs-5" for="chapter">Chapter:</label>
                <input type="text" class="col-xs-7 form-control" name="chapter" id="chapter">
            </div>
            <br>
            <div class="form-group">
                <label class="col-xs-5" for="verse">Verse</label>
                <input type="text" class="col-xs-7 form-control" name="verse" id="verse">
            </div>
            <br>
            <div class="checkbox">
                <?php foreach ($db->query('select * from topic') as $row): ?>
                    <label>
                        <input type="checkbox" name="topics" value="<?php echo $row[1] ?>"> <?php echo $row[1] ?>
                    </label>
                    <br>
                <?php endforeach; ?>
                <input type="text" class="col-xs-7 form-control" name="topics" id="newTopic">
            </div>
            <br>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>


    </body>
</html>
