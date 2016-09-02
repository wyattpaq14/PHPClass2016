<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    </head>
    <body style="width:50%; margin:0 auto;">
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <br>

        <?php
        include './functions/cart.php';
        include './functions/dbconnect.php';
        ?>
        <form action="#" method="post">
            <?php include_once './templates/form2.php'; ?>
            <?php include_once './templates/form1.php'; ?>


            <input type="hidden" name="action" value="Submit1" />
            <button type="submit" class="waves-effect waves-light btn-large" value="Submit1" style="width:100%; margin:0 auto;">Register</button>
        </div>
        <br><br>

        <div class="panel panel-default">
            <div class="panel-body" style="text-align: center;">
                Already a member? <a href="login.php" >Login now!</a>
            </div>
        </div>
    </form>

    <?php
    if ($action === 'Submit1') {
        if (verifyName($fname, $lname)) {
            $db = getDatabase();
            $stmt = $db->prepare("INSERT INTO users SET email = :email, password = :password, created = NOW(), fname = :fname, lname = :lname");

            $binds = array(
                ":email" => $username,
                ":password" => $password,
                ":fname" => $fname,
                ":lname" => $lname
            );
            if (filter_var($username, FILTER_VALIDATE_EMAIL)) {

                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                    $results = 'Data Added';
                }
            } else {
                echo "email verification failed!";
            }
        }
    }
    ?>
</body>
</html>
