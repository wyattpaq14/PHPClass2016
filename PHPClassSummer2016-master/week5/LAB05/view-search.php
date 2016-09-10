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


        <div class="form-group">
            <label for="sel1">Select list:</label>
            <select class="form-control" id="sel1">
                <?php foreach ($results as $row): ?>

                    <option><a href="<?php echo $row['site']; ?>" target="popup"><?php echo $row['site']; ?></a></option>

                <?php endforeach; ?>
            </select>
        </div>


        <?php
        /*
         * http://php.net/manual/en/curl.examples.php
         * http://php.net/manual/en/curl.examples-basic.php
         */
        // create curl resource 
        $curl = curl_init();

        // set url 
        curl_setopt($curl, CURLOPT_URL, "www.example.com");

        //return the transfer as a string 
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string 
        $output = curl_exec($curl);

        // close curl resource to free up system resources 
        curl_close($curl);
        
        ?>
        <curloutput>
        <?php echo $output; ?>
        
            
        </curloutput>


</body>
</html>
