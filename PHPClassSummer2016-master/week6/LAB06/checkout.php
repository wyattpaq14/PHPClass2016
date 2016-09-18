<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
    <title>Shopping Cart Checkout</title>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <body style="width: 90%; margin: 0 auto;">
        <?php
        session_start();

        include './functions/cart.php';
        getLoginState();


        /* php processing variables */
        $action = filter_input(INPUT_POST, 'action');

        if ($action === 'Empty cart') {
            emptyCart();
        }

        /* View variables */
        startCart();
        $cart = getCart();
        $total = getCartTotal();

        include './templates/cart-items.html.php';
        include './templates/clear-cart.html.php';
        ?>

        <p><a href="index.php">Continue Shopping</a></p>
    </body>
</html>
