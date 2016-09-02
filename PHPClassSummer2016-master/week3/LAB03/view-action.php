<!DOCTYPE html>
<html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <meta charset="UTF-8">
        <title>View</title>
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
        $db = getDatabase();

        /*
         * create a variable to hold the database
         * SQL statement
         */
        $stmt = $db->prepare("SELECT * FROM corps");

        /*
         * We execute the statement and make sure we
         * got some results back.
         */
        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        ?>

        <a href="index.php" class="btn btn-default" style="width:200px;">Main</a>

        <table class="table" style="width:400px; margin: 0 auto;">

            <thead>

                <tr>
                    <th>Corporation</th>
                    <th>Phone Number</th>
                </tr>
            </thead>
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

            <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['corp']; ?></td>          
                    <td><?php echo $row['phone']; ?></td>      
                    <td><a href="View.php?id=<?php echo $row['id']; ?>" class="btn btn-default">View</a></td>    
                    <td><a href="Update.php?id=<?php echo $row['id']; ?>" class="btn btn-default">Update</a></td>            
                    <td><a href="Delete.php?id=<?php echo $row['id']; ?>" class="btn btn-default">Delete</a></td>            
                </tr>
            <?php endforeach; ?>
        </table>

    </body>
</html>
