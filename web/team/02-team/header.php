<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <meta charset="utf-8">

        <style>
            nav {
                margin-top: 1em;
            }
        </style>

    </head>
    <body class="container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li class=" <?php echo "$home" ?>" ><a href="home.php">Home</a></li>
                    <li class=" <?php echo "$about" ?>" ><a href="about-us.php">About Us</a></li>
                    <li class=" <?php echo "$login" ?>" > <a href="login.php">Login</a></li>
                </ul>
            </div>
        </nav>
    </body>
</html>
