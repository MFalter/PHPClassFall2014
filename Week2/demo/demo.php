<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // variables in PHP are loosely typed which means they can switch type
        
        $hello = 'hello';
        $hello .= 50;  // Automatically changes it to a variable that holds numbers.
        
        echo $hello, ' world', '<br />', '<p> hellooo again <p/>';
        
        echo "$hello world", "<br />";
        echo '$hello world';
        
        // Double quotes will parse the value of the variable.  Single quotes will display it exactly.
        /* periods concatinate it.  Echos will concatenate things first before sending it.
         * it takes up memory to render it.  To make it render faster in an echo,
         * use a comma instead of a period.  A comma works as seperator.
         * there is also a feature called PRINT that can be used instead of ECHO 
         * but it is slower so don't use it.*/
        
        
        ?>
    </body>
</html>
