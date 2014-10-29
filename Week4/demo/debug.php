<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        
        $hi = 'hey';
        $db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
        
        var_dump($hi); // Allows you to see all the information about that variable
        ?>
    </body>
</html>
