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

        <form method="post">
            <div class="form-group">
                <label for="sel1">Select list:</label>
                <select class="form-control" id="sel1" name="url">
                    <?php foreach ($results as $row): ?>

                        <option><a href="<?php echo $row['site']; ?>" target="popup"><?php echo $row['site']; ?></a></option>

                    <?php endforeach; ?>
                </select>
            </div>
            <input class="btn btn-primary" type="submit" value="Submit" />
        </form>


        <?php
        /*
         * http://php.net/manual/en/curl.examples.php
         * http://php.net/manual/en/curl.examples-basic.php
         */
        // create curl resource 
        $url = filter_input(INPUT_POST, 'url');
        if (isset($url)) {
            $urlArray = explode('//', $url);

            $curl = curl_init();

            // set url 
            curl_setopt($curl, CURLOPT_URL, $urlArray[1]);

            //return the transfer as a string 
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

            // $output contains the output string 
            $output = curl_exec($curl);

            // close curl resource to free up system resources 
            curl_close($curl);
        } else {
            echo "<br> Please hit the submit button!";
        }
        ?>
    <curloutput>
        <?php
        if (isset($output)) {
            echo $output;
        } else {
            
        }
        ?>
    </curloutput>

</body>
</html>
