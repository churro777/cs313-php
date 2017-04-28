<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Assignments<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Week 01</a></li>
                        <li><a href="#">Week 02</a></li>
                        <li><a href="#">Week 03</a></li>
                    </ul>
                </li>
                <li><a href="about-me.php">About Me</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<?php

// current directory

echo dirname(__FILE__);

echo realpath("index.php");
?>
