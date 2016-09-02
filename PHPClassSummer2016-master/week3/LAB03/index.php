<!DOCTYPE html>
<html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <meta charset="UTF-8">
        <title>Main</title>
    </head>
    <body>
        <?php
        /*
         * include the data base connect file
         * and helper functions as if we are adding
         * the code on the page
         */
        include './dbconnect.php';
        include './functions.php';

        /*
         * get and hold a database connection 
         * into the $db variable
         */
        ?>



        <br><br><br>
        <div style="width:400px; margin: 0 auto;">

            <a href="add.php" class="btn btn-default" style="width:200px;">Add</a>
            <a href="view-action.php" class="btn btn-default" style="width:200px;">View</a>
            <a href="index.php" class="btn btn-default" style="width:200px;">Main</a>
        </div>
        <?php
        /*
         * Use a for each loop to go through the
         * associative array. $results is a multi 
         * dimensional array. Arrays with arrays.
         * 
         * So we loop through each result to get back
         * an array with values
         * 
         * feel free to 
         * <?php echo print_r($results); ?>
         * to see how the array is structured
         */
        ?>






    </body>
</html>
