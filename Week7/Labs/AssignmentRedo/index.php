<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
       
            $db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
            $dbs = $db->prepare('select * from signup');
        
            if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
                
                $results = $dbs->fetchAll(PDO::FETCH_ASSOC);
                
                echo '<table border="1">'; 
                echo '<tr><th>Index</th><th>Email</th><th>Password</th>';
                foreach ($results as $key => $value) {
                    echo '<tr>';
                     echo '<td>', $key ,'</td>';
                     echo '<td>', $value['email'] ,'</td>';
                     echo '<td>', $value['password'] ,'</td>';
                     echo '<td><a href="search_email.php?id=',$value['id'],'">Search Email</a></td>';          
                    echo '</tr>';
                }
                echo '</table>';
            }
        ?>
    </body>
</html>