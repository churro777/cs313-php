<?php
    // unset and destroy session
    session_unset();
    session_destroy();
    // return user to shop without old session
    header("Location: shop.php");
?>
