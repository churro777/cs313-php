<?php session_start();
    $_SESSION["insideCart"] = true;

    if (isset($_GET["increase"])) {
        // increase cart amount
        $_SESSION["cartAmount"] = $_SESSION["cartAmount"] + 1;
        // increase amount of specific item
        $item = $_GET["item"];
        $_SESSION["items"][$item] = $_SESSION["items"][$item] + 1;
        // return back to cart.php
        header("Location: cart.php");
    }

    if (isset($_GET["decrease"])) {
        // decrease cart amount
        $_SESSION["cartAmount"] = $_SESSION["cartAmount"] - 1;
        // decrease amount of specific item
        $item = $_GET["item"];
        $_SESSION["items"][$item] = $_SESSION["items"][$item] - 1;
        // return back to cart.php
        header("Location: cart.php");
    }

    // array of the real names of the dice
    $productNames = array("blueDice" => "Blue Dice",
    "copperDice" => "Copper Dice",
    "setOfFive" => "Five Sets",
    "greenGold" => "Green & Gold",
    "limeDice" => "Lime Dice",
    "purpleDice" => "Purple Dice",
    "redDice" => "Red Dice",
    "redDwarven" => "Red Dwarven",
    "yellowTransluscent" => "Yello Dice",

    "cherryTower" => "Cherry Tower",
    "hickoryTower" => "Hickory Tower",
    "wengeTower" => "Wenge Tower",
    "castleTower" => "Castle Tower",
    "stacksTower" => "Stacks Tower",
    "tamarindTower" => "Tamarin Tower",

    "drowRanger" => "Drow Ranger",
    "owlbear" => "Owlbear",
    "humanThug" => "Human Thug",
    "fireDwarf" => "Fire Dwarf",
    "koboldFigher" => "Kobold Figher",
    "humanWizard" => "Human Wizard",
    "fireGiant" => "Fire Giant",
    "humanFighter" => "Human Fighter");


    //price types
    $dicePrice = 2;
    $metalDice = 5;
    $woodTower = 12;
    $specialityTower = 20;
    $standardMini = 8;
    $rareMini = 15;

    // array of how much each item costs
    $productPrices = array("blueDice" => $dicePrice,
    "copperDice" => $metalDice,
    "setOfFive" => "10",
    "greenGold" => $dicePrice,
    "limeDice" => $dicePrice,
    "purpleDice" => $dicePrice,
    "redDice" => $dicePrice,
    "redDwarven" => $metalDice,
    "yellowTransluscent" => $dicePrice,

    "cherryTower" => $woodTower,
    "hickoryTower" => $woodTower,
    "wengeTower" => $woodTower,
    "castleTower" => $specialityTower,
    "stacksTower" => $specialityTower,
    "tamarindTower" => $woodTower,

    "drowRanger" => $standardMini,
    "owlbear" => $standardMini,
    "humanThug" => $standardMini,
    "fireDwarf" => $rareMini,
    "koboldFigher" => $standardMini,
    "humanWizard" => $standardMini,
    "fireGiant" => $rareMini,
    "humanFighter" => $standardMini,
);

    // array total cost per item
    $_SESSION["productPriceTotals"] = array();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>FrostGiants - Cart</title>
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
            <a class="col-xs-2" href="shop.php"><img src="img/returnToShop.png" alt=""></a>
            <div class="col-xs-8">
                <section id="cart" >
                    <div class="row titleRow">
                        <div class="col-xs-3 title">Item</div>
                        <div class="col-xs-3 title">Quantity</div>
                        <div class="col-xs-3 title">Unit Price</div>
                        <div class="col-xs-3 title">Total Price</div>
                    </div>
                    <!-- Create a row for each item that the customer added to their cart -->
                    <?php foreach ($_SESSION["items"] as $itemKey => $qty): ?>
                        <!-- Make sure that there are any of those items -->
                        <?php if ($qty > 0): ?>
                            <div class="row">
                                <!-- name of item -->
                                <div class="col-xs-3 cartInfo">
                                    <?php   foreach ($productNames as $x => $x_value) {
                                                if ($x == $itemKey) { echo "$x_value"; }
                                            }
                                    ?>
                                </div>
                                <!-- quantity -->
                                <div class="col-xs-1 cartInfo qty"><?php echo "$qty" ?></div>
                                <!-- increase or decrease quantity -->
                                <div class="col-xs-2 cartInfo">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <a class="decrease" href="cart.php?decrease=1&item=<?php echo "$itemKey"?>">
                                                <img src="img/minusIcon.png" alt="Decrase Qty">
                                            </a>
                                        </div>
                                        <div class="col-xs-4">
                                            <a class="increase" href="cart.php?increase=1&item=<?php echo "$itemKey"?>">
                                                <img src="img/plusIcon.png" alt="Increase Qty">
                                            </a>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-xs-3 cartInfo center">
                                    <?php echo "$" . $productPrices[$itemKey]; ?>
                                </div>
                                <div class="col-xs-3 cartInfo center">
                                    <?php   foreach ($productPrices as $p => $p_value) {
                                                if ($p == $itemKey) {
                                                    $total =  $p_value * $qty;
                                                    echo "$$total";
                                                    $_SESSION["productPriceTotals"]["$itemKey"] = $total;
                                                }
                                            }
                                    ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>

                    <hr>

                    <div id="cartTotalRow" class="row">
                        <div class="col-xs-4 cartTotal">Total:</div>
                        <div class="col-xs-2 col-xs-offset-6 cartTotal">
                            <?php // sum the totals for each item
                            $cartTotal = "0";
                            foreach ($_SESSION["productPriceTotals"] as $item => $total) {
                                $cartTotal = $cartTotal + $total;
                            }
                            $_SESSION["cartTotal"] = $cartTotal;

                            echo "$$cartTotal"; ?>
                        </div>
                    </div>

                </section>
            </div>
            <a class="col-xs-2" href="checkout.php"><img src="img/checkout.png" alt=""></a>
        </div>



        <?php include 'footer.php' ?>
    </body>
</html>
