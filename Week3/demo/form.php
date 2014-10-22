<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <?php
            if (!empty($POST)) {
                echo $_POST['fullname'];
        //input fields must be inside the form or they won't get sent with the data. 
            }
            
            //$pdo = new PDO($dsn, $username, $passwd, $options); 
            $pdo = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
            // ;dbname portion is optional.  no options for ours and no password so "" for that.
            //PDOs can connect to any type of database without changing the code
            // http://us2.php.net/manual/en/book.pdo.php
            var_dump($pdo);
            
        ?>
        
        <form action="#" method ="post"> 
            <input type="text" name="fullname" value ="" />
            <input type="submit" value="submit" />
        </form>
        
        <?php
        // put your code here
        ?>
    </body>
</html>
