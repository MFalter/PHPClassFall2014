<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
$id = filter_input(INPUT_GET, 'id');
$db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
$dbs = $db->prepare('delete from users where id = :id');     
     
$dbs->bindParam(':id', $id, PDO::PARAM_INT);
        
 if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
     echo '<h1> user ', $id,' was deleted</h1>';
 } else {
      echo '<h1> user ', $id,' was <strong>NOT</strong> deleted</h1>';
 }
        
        
           
?>
        
         <a href="viewpage.php">View Users</a>
    </body>
</html>