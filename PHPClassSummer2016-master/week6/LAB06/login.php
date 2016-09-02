<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
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
        session_start();
        if (empty($_SESSION['login'])) {
            include_once './templates/session-error.php';
        }
        ?>

        <form action="#" method="post">

            <?php include_once './templates/form1.php'; ?>



            <div class="form-group-lg">
                <input type="hidden" name="action" value="Submit1" />
                <button type="submit" class="waves-effect waves-light btn-large" value="Submit1" style="width:100%; margin:0 auto;">Login</button>
            </div>
            <br><br>
            <div class="panel panel-default">
                <div class="panel-body" style="text-align: center;">
                    New? <a href="register.php" >Register now!</a>
                </div>
            </div>
        </form>

        <?php
        if ($action === 'Submit1') {


            $db = getDatabase();

            $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");


            $binds = array(
                ":email" => $username
            );
            $results = array();
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $dbUserId = '';
                $dbEmail = '';
                $dbPassword = '';
            }

            //Enter variables from database
            foreach ($results as $row) {
                $dbUserId = $row['user_id'];
                $dbEmail = $row['email'];
                $dbPassword = $row['password'];
                $_SESSION["uid"] = $dbUserId;
            }

            //Check credentials
            if (verifyLogin($dbEmail, $username, $dbPassword, $password)) {
                header("Location: index.php");
                $_SESSION["login"] = true;
            } else {
                echo "login failure";
            }
        }
//        $UID = getUID($username);
//        foreach ($UID as $ids) {
//                $dbUserId = $row['user_id'];
//            }
        ?>



    </body>
</html>
