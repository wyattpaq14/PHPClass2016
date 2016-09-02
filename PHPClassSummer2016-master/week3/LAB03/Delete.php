<!DOCTYPE html>
<html>
    <head>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <meta charset="UTF-8">
        <title>Delete</title>
    </head>
    <body>
        <?php
        include './dbconnect.php';
        include './functions.php';

        /*
         * get and hold a database connection 
         * into the $db variable
         */
        $db = getDatabase();

        $id = filter_input(INPUT_GET, 'id');

        $stmt = $db->prepare("DELETE FROM corps where id = :id");

        $binds = array(
            ":id" => $id
        );


        $isDeleted = false;
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $isDeleted = true;
        }
        ?>


        <h1> Record <?php echo $id; ?>
            <?php if (!$isDeleted): ?> 
                Not
            <?php endif; ?>
            Deleted</h1>

        <p> <a href="view-action.php">View page</a></p>



    </body>
</html>
