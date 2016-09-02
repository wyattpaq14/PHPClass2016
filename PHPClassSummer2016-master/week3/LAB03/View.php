<!DOCTYPE html>
<html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <meta charset="UTF-8">
        <title>Read</title>
    </head>
    <body>
        <?php
        include './dbconnect.php';
        include './functions.php';

        $db = getDatabase();



        $id = filter_input(INPUT_GET, 'id');




        $results = getRecord($id);

//        $corp = $results['corp'];
//        $incorp_dt = $results['incorp_dt'];
//        $email = $results['email'];
//        $zipcode = $results['zipcode'];
//        $owner = $results['owner'];
//        $phone = $results['phone'];
        ?>
        <a href="index.php" class="btn btn-default" style="width:200px;">Main</a>

        <table class="table" style="width:400px; margin: 0 auto;">
            <thead>
                <tr>
                    <th>Corporation</th>
                    <th>Incorporation Date</th>
                    <th>E-Mail</th>
                    <th>Zip Code</th>
                    <th>Owner</th>
                    <th>Phone Number</th>

                </tr>
            </thead>
            <tr>
                <td><?php echo $results['corp']; ?></td>          
                <td><?php echo $results['incorp_dt']; ?></td>      
                <td><?php echo $results['email']; ?></td>      
                <td><?php echo $results['zipcode']; ?></td>      
                <td><?php echo $results['owner']; ?></td>      
                <td><?php echo $results['phone']; ?></td>  
                <td><a href="Update.php?id=<?php echo $results['id']; ?>" class="btn btn-default">Update</a></td>            
                <td><a href="Delete.php?id=<?php echo $results['id']; ?>" class="btn btn-default">Delete</a></td>            
            </tr>

        </table>



    </body>
</html>
