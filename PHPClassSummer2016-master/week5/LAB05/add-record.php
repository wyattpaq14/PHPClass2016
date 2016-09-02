<!DOCTYPE html>
<html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <meta charset="UTF-8">
        <title>Add Record</title>

    </head>
    <body style="width:1000px; margin:0 auto;">
        <br><br>
        <?php
        include './dbconnect.php';
        include './functions.php';


        $db = getDatabase();
        ?>
        <ul class="nav nav-pills">
            <li role="presentation" class="active"><a href="add-record.php">Add Record</a></li>
            <li role="presentation"><a href="view-search.php">View Records</a></li>
        </ul><br>
        
        <?php $linkboxx = validateRegex(); ?>
        
        
        <form method="get">
            <label class="">Link: </label>
            <input class="form-control" type="text" name="linkbox" value="<?php repopulateField($linkboxx); ?>"/>
            <button class="btn btn-default" type="submit" value="submit1">Submit! </button>
        </form>


        <?php
 

        if (dupeCheck($linkboxx) == 0) {


            $stmt = $db->prepare("INSERT INTO sites SET site = :linkboxx, date = NOW()");

            $binds = array(
                ":linkboxx" => $linkboxx
            );

            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = 'Data Added';
            }
        } else {
            echo "<br>Error! Duplicate link found!";
        }
        ?>



    </body>
</html>
