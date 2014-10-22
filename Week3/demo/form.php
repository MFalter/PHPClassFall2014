<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <?php
            //$pdo = new PDO($dsn, $username, $passwd, $options); 
            $pdo = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
            // ;dbname portion is optional.  no options for ours and no password so "" for that.
            //PDOs can connect to any type of database without changing the code
            // http://us2.php.net/manual/en/book.pdo.php
        
            if (!empty($POST)) {
                
                $sql = "insert into users set fullname=" 
                        . $_POST['fullname'] . 
                        "', email = 'test@test.com', phone= '4014443333', zip= '12345';";
                
                $pdo->exec($sql);
                echo $_POST['fullname'];
            //input fields must be inside the form or they won't get sent with the data. 
            }
                   
            
            //var_dump($pdo);
            
            //$pdo->query($statement); //pdo has an option called query accessible by using ->
            $statement = $pdo->query('select * from users'); //holds the data until you fetch it back
            //$users = $statement->fetch();
            // alternative to using the fetch
            $users = $statement->fetch(PDO::FETCH_ASSOC);
            
            // using the foreach loops on our users database
            foreach($users as $key => $value){
                echo '<p>', $key, ' = ', $value, '</p>';
            }
            
            //fetch all returns an array within an array, a multidimentional array
            $users = $statement->fetchAll(PDO::FETCH_ASSOC);
            var_dump($users);
            foreach ($users as $user){
                foreach($users as $key => $value){
                    echo '<p>', $key, ' = ', $value, '</p>';
                }
            }
            //var_dump($users);
            
            $arr = array();
            //   key       value
            $arr['hello'] = 'hi';
            $arr['hi'] = 'how are you';
            $arr[0] = 'zero';
            
            var_dump($arr);
            
            foreach($arr as $key => $value){
                echo '<p>', $key, ' = ', $value, '</p>';
            }
            
            foreach($arr as $value){
                echo '<p>', $value, '</p>';
            }
            
            
            
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
