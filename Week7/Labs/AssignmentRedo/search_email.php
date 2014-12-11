<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>User Data Update</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>

<body>
    
<?php
$email = "";
$password = "";

$id = filter_input(INPUT_GET, 'id');
$db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
$dbs = $db->prepare('select * FROM signup WHERE id = :id');

$dbs->bindParam(':id', $id, PDO::PARAM_INT);

if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
    $results = $dbs->fetch(PDO::FETCH_ASSOC);
    $email = $results['email'];
    $password = $results['password'];
    }
?>
    
    <div id="content">
        <h1>User Email Update</h1>

        <form action="process_update_email.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
        
        <div id="data">
            <label>Email:</label>
            <input type="text" name="email" value="<?php echo $email; ?>"/><br />

            <label>Password:</label>
            <input type="text" name="password" value="<?php echo $password; ?>"/><br />
        </div>

        <div id="buttons">
            <br />
            <label>&nbsp;</label>
            <input type="submit" value="Update Email"/><br />
        </div>

    </form>
    <?php if (!empty($error_message)) { ?>
        <p class="error"><?php echo $error_message; ?></p>
    <?php } ?> 
    </div>
    
    <a href="index.php">View Users</a> 
    
</body>
</html>