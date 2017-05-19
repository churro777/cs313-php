<?php session_start() ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>FrostGiants - Return Policy</title>
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
    <body class="container-fluid">

        <!-- header -->
        <?php include 'header.php' ?>

        <!-- sidenav and content -->
        <section class="row">
            <div class="col-xs-10 col-xs-offset-1">
                <div class="info">
                    <div class="row">
                        <h2 class="col-xs-12">Return Policy</h2>
                    </div>
                    <div class="row">
                        <p class="col-xs-12">You may return most new, unopened items within 30 days of delivery for a full refund,
                            provided that the merchandise is in resalable condition when it is returned. We will pay the return
                            shipping costs only if the return is a result of our error. Sale/clearance items are not refundable.
                            <br>
                            <br>
                            You should expect to receive your refund within two weeks of giving your package to the return shipper,
                            however, in many cases you will receive a refund more quickly. This time period includes the transit
                            time for us to receive your return from the shipper, the time it takes us to process your return once
                            we receive it, and the time it takes your bank to process our refund request.
                            <br>
                            <br>
                            If you need to return an item, simply login to your account, view the order using the "Complete
                            Orders" link under the My Account menu, and click the Return Item(s) button. If you do not have an
                            account on our web site, please use the form on our <a href="contact.php">Contact Us</a> page to
                            notify us of your return request.
                            <br>
                            <br>
                            To ensure that the returned items get back to us in good shape, ship them in a padded envelope or
                            sturdy box. You may be able to use USPS First Class Mail to return lighter items up to 15 ounces, but
                            we recommend that you use USPS Priority Mail, FedEx, or UPS.
                            <br>
                            <br>
                            We'll notify you via e-mail of your refund once we've received and processed the returned item.</p>
                    </div>
                </div>

            </div>
        </section>

        <?php include 'footer.php' ?>

    </body>
</html>
