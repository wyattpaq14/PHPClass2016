<!DOCTYPE html>
<html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <meta charset="UTF-8">
        <title>Update</title>
    </head>
    <body>
        <?php
        include './dbconnect.php';
        include './functions.php';
        $result = "";
        $db = getDatabase();

        if (isPostRequest()) {
            $id = filter_input(INPUT_POST, 'id');
            $corp = filter_input(INPUT_POST, 'corp');
            $incorp_dt = filter_input(INPUT_POST, 'incorp_dt');
            $email = filter_input(INPUT_POST, 'email');
            $zipcode = filter_input(INPUT_POST, 'zipcode');
            $owner = filter_input(INPUT_POST, 'owner');
            $phone = filter_input(INPUT_POST, 'phone');

            if (updateRecord($id, $corp, $incorp_dt, $email, $zipcode, $owner, $phone)) {
                $result = 'Record updated';
            } else {
                $result = 'Record not updated';
            }
        } else {
            $id = filter_input(INPUT_GET, 'id');

            if (!isset($id)) {
                die('Record not found');
            }

            $results = getRecord($id);

            $corp = $results['corp'];
            $incorp_dt = $results['incorp_dt'];
            $email = $results['email'];
            $zipcode = $results['zipcode'];
            $owner = $results['owner'];
            $phone = $results['phone'];
        }
        ?>

        <h1><?php echo $result; ?></h1>
        <a href="index.php" class="btn btn-default" style="width:200px;">Main</a>
        <form method="post" action="#" style="width:400px; margin: 0 auto;">   
            <div class="form-group">
                Corporation <input type="text" class="form-control" value="<?php echo $corp; ?>" name="corp" />
                <br />
                E-Mail <input type="text" class="form-control" value="<?php echo $email; ?>" name="email" />
                <br />
                Zip Code <input type="text" class="form-control" value="<?php echo $zipcode; ?>" name="zipcode" />
                <br />
                Owner <input type="text" class="form-control" value="<?php echo $owner; ?>" name="owner" />
                <br />
                Phone Number <input type="text" class="form-control" value="<?php echo $phone; ?>" name="phone" />
                <br />
            </div>
            <input type="hidden" value="<?php echo $id; ?>" name="id" /> 
            <input type="submit" class="btn btn-default" value="Update" />
            <td><a href="view-action.php" style="float:right;" class="btn btn-default">View</a></td> 

        </form>



    </body>
</html>
