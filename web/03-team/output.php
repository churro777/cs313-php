<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>

        <p>Hello there <?php echo $_POST["name"];?></p>

        <a href="mailto:<?php echo $_POST["email"];?>"><?php echo $_POST["email"];?></a>


        <?php
        $majors = array("CS"  => "Computer Science",
                        "WDD" => "Web Design & Development",
                        "CIT" => "Computer Information Technology",
                        "CE"  => "Computer Engineering");

        foreach($majors as $x=>$x_value){
            if($x == $_POST["major"]){
                echo "<p>How are you liking $x_value? Are you considering switching to Humanities yet?</p>";
            }
        }
        ?>

        <br />

        <!-- <?php


        foreach($continents as $x=>$x_value){
            if($x == $_POST["visted"]){
                echo "<p>$x_value</p><br />";
            }
        }
        ?> -->

        <?php
            $continents = array("NA"  => "North America",
                            "SA" => "South America",
                            "EU" => "Europe",
                            "AS" => "Asia",
                            "AU" => "Australia",
                            "AF" => "Africa",
                            "AN"  => "Antartica");

            foreach($_POST["visited"] as $country){
                foreach($continents as $y=>$y_value){
                    if ($y == $country){
                        echo "<p>$y_value</p>";
                    }
                }
            }

         ?>


        <p>We got your message.</p>
        <blockquote><?php echo $_POST["comments"];?></blockquote>

    </body>
</html>
