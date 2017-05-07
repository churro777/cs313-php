<!-- Banner and Cart -->
<header class="row">
    <!-- Banner -->
    <div class="no-pad col-xs-10">
        <a href="shop.php"><img src="img/banner2.jpg" alt="FrostGiants: Game Master Accessories"></a>
    </div>

    <!-- Login/Sign-up or Username and Cart -->
    <div id="cartContainer" class="col-xs-2">
        <div class="row">
            <a class="col-xs-12" href="#"><img src="img/login.png" alt="Login"></a>
        </div>
        <div class="row">
            <a class="col-xs-12" href="#"><img src="img/register.png" alt="Register"></a>
        </div>

        <?php if (!$_SESSION["insideCart"]): ?>
            <hr>
            <div id="miniCart" class="row">
                <a class="col-xs-12" href="cart.php"><img src="img/cart.png" alt="Register"></a>
                <div id="cartAmount"><?php echo $_SESSION["cartAmount"] ?></div>
            </div>
        <?php endif; ?>
    </div>
</header>

<hr>
