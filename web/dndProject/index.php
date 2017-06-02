<?php session_start();
$_SESSION["badLogin"] = "true";

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="img/logoIcon.ico" type="image/gif" sizes="16x16">
        <title>Welcome to Ashardalon</title>
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

        <link rel="stylesheet" href="css/dndMain.css" />
        <link rel="stylesheet" href="css/basic.css" />
    </head>
    <body class="container-fluid">
        <div class="row space-1">
            <div class="col-xs-1">
                <img src="img/logo.png" alt="">
            </div>
            <h1 class="col-xs-10 center">Welcome to Ashardalon Character Creator</h1>
            <div class="col-xs-1">
                <img src="img/logo.png" alt="">
            </div>
        </div>
        <div class="row">
            <p class="col-xs-12 center">Where you can create and store your characters.</p>
        </div>
        <div class="row">
            <div id="loginBox" class="col-xs-4 col-xs-offset-4 space-4">
                <form id="loginForm" action="php/authenticateUser.php" method="post">
                    <div class="form-group">
                        <label for="username"></label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="password"></label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <a id="createAccount" class="col-xs-4" href="createAccount.php">Create Account</a>
                            <div class="col-xs-4 col-xs-offset-4">
                                <button type="submit" class="btn btn-default floatRight">Login</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
