<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    </head>
    <body style="width:1000px; margin: 0 auto;">
        <?php
        /*
         * include the data base connect file
         * and helper functions as if we are adding
         * the code on the page
         */
        include './functions/dbconnect.php';
        include './functions/dbData.php';
        include './includes/form1.php';
        include './includes/form2.php';

        $rowCount = 0;

        //Get all the data with or without being sorted
        $results = getAllCorpData();

        //Search only if the second sobmit button is clicked
        if (checkSubmit()) {
            $results = searchCorps();
        }
        ?>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Corporation</th>
                    <th>Incorporation Date</th>
                    <th>Email</th>
                    <th>Zip Code</th>
                    <th>Owner</th>
                    <th>Phone Number</th>
                </tr>
            </thead>

            <?php foreach ($results as $row): ?>
                <tr>
                    <?php $row['incorp_dt'] = date("m-d-Y", strtotime($row['incorp_dt'])); ?>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['corp']; ?></td>
                    <td><?php echo $row['incorp_dt']; ?></td> 
                    <td><?php echo $row['email']; ?></td>            
                    <td><?php echo $row['zipcode']; ?></td>            
                    <td><?php echo $row['owner']; ?></td>            
                    <td><?php echo $row['phone']; ?></td>            
                </tr>
                <!-- Increment row count as the loop runs -->
                <?php $rowCount++; ?>
            <?php endforeach; ?>
        </table>
        <!-- Print out number of rows -->
        <?php echo resultCount($rowCount); ?>

    </body>
</html>
