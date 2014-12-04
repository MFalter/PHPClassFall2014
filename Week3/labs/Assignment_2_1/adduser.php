<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>User Data Add</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>

<body>
    
    <div id="content">
    <h1>User Data Add</h1>
    <?php 
    $db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
    
        if (empty($_POST) )
        {
        if ( empty($name) ) 
        { $name = ""; } 
        if ( empty ($phone_number) )
        { $phone_number = ""; }
        if ( empty ($email) )
        { $email = ""; }
        if ( empty($zip_code) )
        { $zip_code = ""; }
    } ?>
    <form action="display_results.php" method="post">

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
            <input type="submit" value="Add User"/><br />
        </div>

    </form>
    <?php if (!empty($error_message)) { ?>
        <p class="error"><?php echo $error_message; ?></p>
    <?php } 
    $dbs = $db->prepare('insert users set fullname = :name, email = :email, phone = :phone_number, zip = :zip_code');
    
    $name = filter_input(INPUT_POST, 'name');
    $email = filter_input(INPUT_POST, 'email');
    $phone_number = filter_input(INPUT_POST, 'phone_number');
    $zip_code = filter_input(INPUT_POST, 'zip_code');
    
    $dbs->bindParam(':name', $name, PDO::PARAM_STR);
    $dbs->bindParam(':email', $email, PDO::PARAM_STR);
    $dbs->bindParam(':phone_number', $zip_code, PDO::PARAM_STR);
    $dbs->bindParam(':zip_code', $zip_code, PDO::PARAM_STR);
    
    if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
        echo '<h1> user ', $name,' was added</h1>';
    } else {
      echo '<h1> user ', $name,' was <strong>NOT</strong> added</h1>';
    }
    ?> 
        
    </div>
    
        <a href="index.php">View Users</a>
</body>
</html>