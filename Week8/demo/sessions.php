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
        
        echo session_id();
        
        $_SESSION['loggedin'] = true;
        
        session_regenerate_id();
        echo '<br />';
        
        session_destroy();
        
        $s = serialize($_SESSION);
        var_dump($s);
        $s = unserialize($s);
        echo '<br />';
        var_dump($s);
        ?>
    </body>
</html>