<?php $home = 'active'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Welcome to Art's CS 313 Homepage!</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!-- global stylesheet -->
        <link rel="stylesheet" href="main.css" />
    </head>

    <body class="container">
        <!-- header -->
        <?php include 'header.php' ?>
        <!-- navbar -->
        <?php include 'navbar.php' ?>

        <!-- content - some paragraphs about the class and stuff-->
        <section class="row">
            <div class="content col-xs-12">
                <div class="row">
                    <h1 class="col-xs-12">Welcome to Arturo Aguila's website for CS 313!</h1>
                </div>
                <div class="row">
                    <p class="col-xs-12">
                        There are many exciting thing additions that will be
                        coming this semester.
                    </p>
                </div>

                <div class="row">
                    <h2 class="col-xs-12">About the Class</h2>
                </div>
                <div class="row">
                    <p class="col-xs-12">
                        CS 313 - Web Engineering II is all about learning full stack web development. Brother Burton teaches our
                        class. We are currently using Heroku to host our webpages.
                    </p>
                </div>

            </div>
        </section>
        <!-- End content -->
    </body>
</html>
