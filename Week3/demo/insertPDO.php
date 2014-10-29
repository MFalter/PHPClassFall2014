<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
         <?php
         
             $pdo = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
            
         
            if ( !empty($_POST) ) {
                
                /*
                 * Best to create the query in a string and confirm 
                 * its how it should be.
                 * 
                 * Notice that there is no id.  Since we are using auto increment
                 * for the id MySQL will automatically add an id for you.
                 */
                $sql = "insert into users set fullname='"
                        . $_POST['fullname'] . 
                        "', email = 'test@test.com', phone = '4014443333', zip = '12345';";
                
                
                echo $sql ;
                
                /*
                 * run the statement.  
                 * exec() returns the number of rows affected 
                 * returns the number of rows that were modified or 
                 * deleted by the SQL statement you issued. 
                 * If no rows were affected returns 0.
                 */
                if ( $pdo->exec($sql) ) {
                    echo 'Saved Data';                    
                } else {
                    echo 'Saved NOT Data';
                }
                    
                
                echo $_POST['fullname'];
            }
                        
            
        ?>  
        
        <form action="#" method="post">            
            <input type="text" name="fullname" value="" />            
            <input type="submit" value="submit" />            
        </form>
        
        
       
    </body>
</html>