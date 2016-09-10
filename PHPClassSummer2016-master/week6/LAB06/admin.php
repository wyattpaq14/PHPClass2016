<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin Panel</title>
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
        <script type="text/javascript" src="js/initselect.js"></script>

        <?php
        include './functions/cart.php';
        include './functions/dbconnect.php';

        session_start();
        getLoginState();
        retreiveCart();

        //Check if user is admin

        if (!isAdmin()) {
            header("Location: index.php");
        }





        /* php processing variables */



        /* View variables */
        startCart();
        $allCategories = getCategories();
        $cartCount = cartCount();


        include_once './templates/categories.html.php';
        include_once './templates/admin.html.php';
        include_once './templates/admin-fields.html.php';


        if ($selectAction == 'add_c') {
            include_once './templates/admin-templates/add_c.html.php';
        } else if ($selectAction == 'add_i') {
            include_once './templates/admin-templates/add_i.html.php';
        } else if ($selectAction == 'edit_c') {
            include_once './templates/admin-templates/edit_c.html.php';
        } else if ($selectAction == 'edit_i') {
            include_once './templates/admin-templates/edit_i.html.php';
        } else if ($selectAction == 'remove_c') {
            include_once './templates/admin-templates/remove_c.html.php';
        } else if ($selectAction == 'remove_i') {
            include_once './templates/admin-templates/remove_i.html.php';
        } else {
            
        }
        
        adminFunctionShit($action);
        ?>


    </body>
</html>
