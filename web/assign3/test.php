<?php session_start();
    // Set carAmount to 0 if it is null
    if (is_null($_SESSION["cartAmount"])){
        $_SESSION["cartAmount"] = 0;
        $_SESSION["items"] = array();
    }

    // false = show the cart section in the header
    $_SESSION["insideCart"] = false;


    // Add item to cart was clicked - update all the session variables and go back to shop
    if (isset($_GET["item"])) {
        // get the itemID

        // increase quantity of certain item
        $item = $_GET["item"];
        $_SESSION["items"][$item] = $_SESSION["items"][$item] + 1;

        // increase amount of items in cart
        $_SESSION["cartAmount"] = $_SESSION["cartAmount"] + 1;

        // Send user back to the shop - mainly so URL is the same
        header("Location: shop.php");
    }


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>FrostGiants - Home</title>
        <link rel="icon" href="img/frostGiants.ico" type="image/gif" sizes="16x16">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
        integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="a1.css">
        <script type="text/javascript" src="shop.js"></script>
    </head>
    <body class="container-fluid" onload="generateAllProducts()">

        <!-- header -->
        <?php include 'header.php' ?>

        <!-- sidenav and content -->
        <section class="row">
            <div id="sidenavContainer" class="col-xs-2">
                <!-- Shops in store -->
                <div id="sidenav">
                    <div class="row" onclick="generateAllProducts()"><a class="sideLink col-xs-12" href="#">All Items</a></div>
                    <div class="row" onclick="generateAllProducts(1)"><a class="sideLink col-xs-12" href="#">Dice</a></div>
                    <div class="row" onclick="generateAllProducts(2)"><a class="sideLink col-xs-12" href="#">Dice Towers</a></div>
                    <div class="row" onclick="generateAllProducts(3)"><a class="sideLink col-xs-12" href="#">Miniatures</a></div>
                </div>
            </div>


            <!-- Shop -->
            <div class="col-xs-10">
                <!-- item -->
                <div id="shop"></div>
            </div>

        </section>

        <?php include 'footer.php' ?>

    </body>
</html>
