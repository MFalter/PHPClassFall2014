<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
            $today = date('m-d-y'); // built in date function
            $time = time(); // Gives everything in milliseconds.
            
            $str2time = strtotime('11/12/14'); // Allows you to get a time
            echo $str2time;
            echo '<br />';
            echo date($time); // Convert from time to date
        
        ?>
    </body>
</html>
