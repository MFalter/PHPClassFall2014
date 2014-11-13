<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        $int = 12; // Whole number
        $float = 12.23; // Has a decimal
        
        echo $int;
        echo '<br />';
        echo $float;
        echo '<br />';
        echo round($float); // page 279
        echo '<br />';
        echo pi(); // built in
        echo '<br />';
        echo '<br />';
        $bool = true;
        $flt = 89.998;
        $str = 'hello';
        $num = 55;
        echo intval($bool); // makes sure the int value is a number.
        echo '<br />';
        echo intval($flt);
        echo '<br />';
        echo intval($str);
        echo '<br />';
        echo intval($num);
        echo '<br />';
        
        ?>
    </body>
</html>
