<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Shopping Cart</title>
        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body style="width: 90%; margin: 0 auto;">
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>




        <?php
        include './functions/cart.php';
        include './functions/dbconnect.php';
        session_start();
        getLoginState();

        /* php processing variables */
        $action = filter_input(INPUT_POST, 'action');
        $cartID = filter_input(INPUT_POST, 'id');
        $catID = filter_input(INPUT_GET, 'cat');

        if ($action === 'Buy') {
            addToCart($cartID);
        }

        if ($action === 'Empty cart') {
            emptyCart();
        }


        /* View variables */
        startCart();
        $items = getItems();
        $cartCount = cartCount();
        $allCategories = getCategories();



        include './templates/categories.html.php';
        include './templates/account-fields.php';
        ?>

    </body>
</html>
