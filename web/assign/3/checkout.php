<?php session_start();
    $_SESSION["insideCart"] = true;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>FrostGiants - Checkout</title>
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
    <script type="text/javascript">
        function submitAddressForm(){
            document.addressForm.submit();
        }
    </script>
</head>
    <body class="container-fluid">
        <?php include 'header.php' ?>

        <section class="row">
            <a class="col-xs-2" href="cart.php"><img src="img/returnToCart.png" alt=""></a>
            <div class="col-xs-8">
                <section id="checkout">
                    <form name="addressForm" class="addressForm" action="confirm.php" method="post">
                        <div class="form-group">
                            <label class="formLabel" for="userEmail">Email address</label>
                            <input type="email" class="form-control" id="userEmail" name="email" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label class="formLabel" for="address1">Address</label>
                            <div class="row">
                                <div class="col-xs-8">
                                    <input type="text" class="form-control" id="address1" name="address1" placeholder="Enter Your Address">
                                </div>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" id="address2" name="address2" placeholder="Apt">
                                </div>
                            </div>
                            <div class="row space-1">
                                <div class="col-xs-5">
                                    <input type="text" class="form-control" id="city" name="city" placeholder="City">
                                </div>
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="State" name="state" placeholder="State">
                                </div>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" id="zipCode" name="zip" placeholder="Zip Code">
                                </div>
                            </div>
                        </div>
                    </form>

                    <hr>

                    <div id="cartTotalRow" class="row">
                        <div class="col-xs-4 cartTotal">Total:</div>
                        <div class="col-xs-2 col-xs-offset-5 cartTotal">
                            <?php $cartTotal = $_SESSION["cartTotal"];
                                echo "$$cartTotal"; ?>
                        </div>
                    </div>

                </section>
            </div>

            <a href="#" class="col-xs-2" type="submit" onclick="submitAddressForm()"><img src="img/completePurchase.png" alt=""></a>
        </section>



        <?php include 'footer.php' ?>
    </body>
</html>
