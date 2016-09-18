<html>

    <head>
        <meta charset="UTF-8">
        <title>Shopping Cart</title>
        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.css"  media="screen,projection"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>

        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
        <?php include './includes/sitelinksForm.php'; ?>
        
        
        <?php
        include './functions.php';
        if (isPostRequest()) {
            $url = filter_input(INPUT_POST, 'link');

            if (filter_var($url, FILTER_VALIDATE_URL) == false) {

                echo "url not valid";
            } else {

                $output = getSiteOutput($url);

                $links = collectLinks($output);

                collectLinks($output);
                insertSite($url, $links);
            }
        }
        ?>























    </body>


</html>









