<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        include './Sample.php'; // include the class file
        include './Config.php';
        include './Util.php';
        
        $sample = new Sample(); // Set the variable and it becomes like a gateway.
        $sample->say(); // Call the variable and the method.  Don't need to echo because the method does.
        
        $sample->db; // Don't need the $ just the variable name.
                
        if ( $sample->setDb('database') ) {
            echo 'it worked';
        } else {
            echo 'error';
        }

        echo $sample->getDb();
        
        echo Config::DB_DNS;
        
        $util = new Util();
        
        $util->isPostRequest();
        
        ?>
    </body>
</html>
