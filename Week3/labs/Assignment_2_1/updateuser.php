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
$dbs = $db->prepare('update from users where id = :id');     
     
$dbs->bindParam(':id', $id, PDO::PARAM_INT);

 if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
     $results = $dbs->fetch(PDO::FETCH_ASSOC);
     ?>
        
        <div id="content">
        <h1>User Data</h1>

        <form action="updateuser.php.php" method="post" id="update_user"  >  
        <label>Name:</label>
        <span><?php echo $results['name']; ?></span><br />

        <label>Phone Number:</label>
        <span><?php echo $results['phone_number']; ?></span><br />

        <label>Email:</label>
        <span><?php echo $results['mail']; ?></span><br />

        <label>Zip Code:</label>
        <span><?php echo $results['zip_code']; ?></span><br />
    </div>
<a href="index.php">View Users</a>
     
    <?php
     echo '<h1> user ', $id,' was updated</h1>';
 } //else {
     // echo '<h1> user ', $id,' was <strong>NOT</strong> updated</h1>';
 //}
         
?>
        
         <a href="index.php">View Users</a>
    </body>
</html>