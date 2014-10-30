<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>User Data Update</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>

<body>
    
<?php
$name = "";
$phone_number = "";
$email = "";
$zip_code = "";

$id = filter_input(INPUT_GET, 'id');
$db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
$dbs = $db->prepare('select * FROM users WHERE id = :id');

$dbs->bindParam(':id', $id, PDO::PARAM_INT);

if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
    $results = $dbs->fetch(PDO::FETCH_ASSOC);
    $name = $results['fullname'];
    $phone_number = $results['phone'];
    $email = $results['email'];
    $zip_code = $results['zip'];
    }
?>
    
    <div id="content">
        <h1>User Data Update</h1>

        <form action="process_update_user.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
        
        <div id="data">
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo $name; ?>"/><br />

            <label>Phone Number:</label>
            <input type="text" name="phone_number" value="<?php echo $phone_number; ?>"/><br />

            <label>Email:</label>
            <input type="text" name="email" value="<?php echo $email; ?>"/><br />
            
            <label>Zip Code:</label>
            <input type="text" name="zip_code" value="<?php echo $zip_code; ?>"/><br />
        </div>

        <div id="buttons">
            <br />
            <label>&nbsp;</label>
            <input type="submit" value="Update User"/><br />
        </div>

    </form>
    <?php if (!empty($error_message)) { ?>
        <p class="error"><?php echo $error_message; ?></p>
    <?php } ?> 
    </div>
    
    <a href="index.php">View Users</a> 
    
</body>
</html>