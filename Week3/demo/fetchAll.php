<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
         <?php
         
         /*
          * PDO instance object.
          * use -> to access functions within the object          
          */
          $pdo = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
            
          /*
           * The SQL statement is used to query the database
           */
           $statement = $pdo->query('select * from users');
           
           /*
            * Once the query is made you can fetch the data.
            * I recommend to get the array back as an associative
            * array
            */
           
           $users = $statement->fetchAll(PDO::FETCH_ASSOC);
            //var_dump($users);
           
           /*
            * It returns a multidimentional array so we have a foreach loop
            * within another foreach loop
            */
            foreach($users as $user) {
                foreach($user as $key => $value) {
                    echo '<p>', $key , ' = ', $value, '</p>';
                }
            }
           
              
            
        ?>  
               
    </body>
</html>