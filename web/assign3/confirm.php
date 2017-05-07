<?php session_start();
    $_SESSION["insideCart"] = true;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>FrostGiants - Confirm Order</title>
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
</head>
    <body class="container-fluid">
        <?php include 'header.php' ?>

        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <section id="confirmation">
                    <div class="row">
                        <h2 class="col-xs-12 center">Thanks for shopping with us!</h2>
                    </div>
                    <div class="row">
                        <h3 class="col-xs-12 center">A confirmation email was sent to <?php echo $_POST["email"]; ?>.</h3>
                    </div>
                    <div class="row">
                        <h3 class="col-xs-12 center">Your items will be sent to:
                            <br>
                            <?php echo $_POST["address1"] . " " . $_POST["address2"]; ?>
                            <br>
                            <?php echo $_POST["city"] . " " . $_POST["state"] . " " . $_POST["zip"]; ?>
                        </h3>
                    </div>

                    <hr>

                    <div class="row space-1">
                        <div class="col-xs-5 col-xs-offset-1 receiptText" >Receipt</div>
                        <div class="col-xs-4 receiptText" >Total: <?php echo "$" . $_SESSION["cartTotal"]; ?></div>
                    </div>

                    <div class="row">
                        <h3 class="col-xs-4 col-xs-offset-1 receiptTitle">Item</h3>
                        <h3 class="col-xs-3 receiptTitle">Quantity</h3>
                        <h3 class="col-xs-3 receiptTitle">Price</h3>
                    </div>

                    <?php foreach ($_SESSION["items"] as $itemKey => $qty): ?>
                        <div class="row">
                            <div class="col-xs-4 col-xs-offset-1 receiptInfo"><?php echo "$itemKey"; ?></div>
                            <div class="col-xs-2 col-xs-offset-1 receiptInfo"><?php echo "$qty"; ?></div>
                            <div class="col-xs-3 receiptInfo"><?php echo "$" .$_SESSION["productPriceTotals"]["$itemKey"]; ?></div>
                        </div>
                    <?php endforeach; ?>


                </section>
            </div>

            <a class="col-xs-2" href="shop.php"><img src="img/returnToShop.png" alt=""></a>

        </div>


        <?php include 'footer.php' ?>
    </body>
</html>
