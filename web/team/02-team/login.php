<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Green Lamps - Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    </head>
    <body>

        <?php $login = 'active'; include 'header.php'; ?>


        <form action="home.php" method="post">
            <button type="submit" name="test" value="test">Login as Test</button>
            <button type="submit" name="admin" value="admin">Login as Administrator</button>
            <button type="submit" name="logout" value="logout">Logout</button>
        </form>

        <!-- <a href="update.php/name=tester"><button>Login as Tester</button></a>
        <a href="update.php/name=admin"><button>Login as Administrator</button></a>  -->

    </body>
</html>
