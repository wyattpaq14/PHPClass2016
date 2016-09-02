<!DOCTYPE html>
<html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <meta charset="UTF-8">
        <title>View & Search</title>
    </head>
    <body style="width:1000px; margin:0 auto;">
        <br><br>
        <?php
        /*
         * include the data base connect file
         * and helper functions as if we are adding
         * the code on the page
         */
        include './dbconnect.php';
        include './functions.php';

        $results = getSites();
        ?>
        <ul class="nav nav-pills">
            <li role="presentation"><a href="add-record.php">Add Record</a></li>
            <li role="presentation" class="active"><a href="view-search.php">View Records</a></li>
        </ul><br>
        <?php include './form2.php'; ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Site</th>
                    <th>Date Added</th>
                </tr>
            </thead>

            <?php foreach ($results as $row): ?>
                <tr>
                    <?php $row['date'] = date("m-d-Y", strtotime($row['date'])); ?>
                    <td><?php echo $row['site_id']; ?></td>
                    <td><a href="<?php echo $row['site']; ?>" target="popup"><?php echo $row['site']; ?></a></td>
                    <td><?php echo $row['date']; ?></td>            
                </tr>

            <?php endforeach; ?>
        </table>



    </body>
</html>
