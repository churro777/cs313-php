<?php session_start() ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
    </head>
    <body>
        <form class="" action="authenticate.php" method="post">
            <label for="username">Username:</label> <input id="username" type="text" name="username"/>
            <br>
            <label for="password">Password:</label> <input id="password" type="text" name="password"/>
            <button type="submit" name="submit">Login</button>
        </form>


    </body>
</html>
