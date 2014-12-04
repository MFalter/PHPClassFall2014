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
            
    </div>
    
        <a href="index.php">View Users</a>
</body>
</html>