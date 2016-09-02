<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <style>
    </style>

    <body>
        <?php
        //Declare vars in centralized location for ease of access
        $tableRows = 10;
        $tableColumns = 10;
        ?>



        <table border="1">
            <?php for ($tr = 1; $tr <= $tableRows; $tr++): ?>
                <tr>
                    <?php for ($td = 1; $td <= $tableColumns; $td++): ?>
                    <?php//Randomize color within the loop for unique colors, rather than a single color ?>
                        <?php $randColor = '#' . strtoupper(dechex(rand(0x000000, 0xFFFFFF))); ?>
                        <td style="background-color:<?php echo $randColor; ?>"> <?php echo $randColor; ?> 
                            <span style="background-color:white"><?php echo $randColor; ?></span>
                        </td>
                    <?php endfor; ?>
                </tr>
            <?php endfor; ?>
        </table>

    </body>
</html>
