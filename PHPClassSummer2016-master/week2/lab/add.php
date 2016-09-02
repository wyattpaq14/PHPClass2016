<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add</title>
        <link rel="stylesheet" type="text/css" href="css\bootstrap.css">
    </head>
    <body>
        <?php
        include './dbconnect.php';
        include './functions.php';

        $results = '';

        if (isPostRequest()) {
            $db = getDatabase();

            $stmt = $db->prepare("INSERT INTO actors SET firstname = :firstname, lastname = :lastname, dob = :dob, height = :height");

            $firstname = filter_input(INPUT_POST, 'firstname');
            $lastname = filter_input(INPUT_POST, 'lastname');
            $dob = filter_input(INPUT_POST, 'dob');
            $height = filter_input(INPUT_POST, 'height');

            $binds = array(
                ":firstname" => $firstname,
                ":lastname" => $lastname,
                ":dob" => $dob,
                ":height" => $height
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
        <div id="nav">
            <div class="navbar"> <a href="view.php">View</a> <a href="add.php">Create</a> </div>
        </div>

        <h1><?php echo $results; ?></h1>

        <form method="post" action="#">            
            First Name: &nbsp;&nbsp; <input type="text" value="" name="firstname" />
            <br /><br />
            Last Name: &nbsp;&nbsp; <input type="text" value="" name="lastname" />
            <br /><br />
            Date of Birth: &nbsp;&nbsp;  <input type="date" value="" name="dob" />
            <br /><br />
            Height:  &nbsp;&nbsp;<input type="text" value="" name="height" />
            <br />

            <input type="submit" value="Submit" />
        </form>
    </body>
</html>
