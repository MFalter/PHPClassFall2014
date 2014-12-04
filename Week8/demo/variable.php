<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        
        session_start();
        
        $_SESSION['loggedin'] = false;
        $_SESSION['cart'] = array('item1', 'item2');
         
        ?>
    </body>
</html>