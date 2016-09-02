<!DOCTYPE html>
<html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <meta charset="UTF-8">
        <title>Create</title>
    </head>
    <body>
        <?php
        include './dbconnect.php';
        include './functions.php';

        $results = '';

        if (isPostRequest()) {
            $db = getDatabase();

            $stmt = $db->prepare("INSERT INTO corps SET corp = :corp, incorp_dt = :incorp_dt, email = :email, zipcode = :zipcode, owner = :owner, phone = :phone");

            $corp = filter_input(INPUT_POST, 'corp');
            $incorp_dt = filter_input(INPUT_POST, 'incorp_dt');
            $email = filter_input(INPUT_POST, 'email');
            $zipcode = filter_input(INPUT_POST, 'zipcode');
            $owner = filter_input(INPUT_POST, 'owner');
            $phone = filter_input(INPUT_POST, 'phone');

            $binds = array(
                ":corp" => $corp,
                ":incorp_dt" => $incorp_dt,
                ":email" => $email,
                ":zipcode" => $zipcode,
                ":owner" => $owner,
                ":phone" => $phone
            );

            /*
             * empty()
             * isset()
             */

            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = 'Data Added';
            }
        }
        ?>


        <h1><?php echo $results; ?></h1>
        <a href="index.php" class="btn btn-default" style="width:200px;">Main</a>
        <form method="post" action="#" style="width:400px; margin: 0 auto;">     
            <div class="form-group">
                Corp <input type="text" value="" class="form-control" name="corp" />
                <br />
                Incorp Date <input type="date" value="" class="form-control" name="incorp_dt" />
                <br />
                Email <input type="text" value="" class="form-control" name="email" />
                <br />
                zipcode <input type="text" value="" class="form-control" name="zipcode" />
                <br />
                owner <input type="text" value="" class="form-control" name="owner" />
                <br />
                phone <input type="text" value="" class="form-control" name="phone" />
                <br />

                <input type="submit" class="btn btn-default" value="Submit" style="width:400px;"/>
            </div>
        </form>
    </body>
</html>
