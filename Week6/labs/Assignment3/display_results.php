<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"
    
Create a Signup web form (page) that will take in a email and password. 
Add Validation to check for an email 
and make sure a password greater than 4 characters are entered.  
Once everything is validated save the data into the data base.  
Before saving the password, make sure to hash the password using the sha1 function built into PHP.

Check Github for the SQL needed>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Signup</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<body>
    <div id="content">
        <h1>Signup</h1>
        <?php 
        // get the data from the form
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    //$message = filter_input(INPUT_POST, 'message')
        
        $db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
        $dbs = $db->prepare('select * from signup');
    
        if (empty($_POST) )
        {
            if ( empty ($email) )
            { $email = ""; }
            if ( empty($password) )
            { $password = ""; }
        } ?>
        
        <form action="#" method="post">
        <input type="hidden" name="action" value="process_data"/>

        <label>E-Mail Address:</label>
        <input type="text" name="email" 
               value="<?php echo htmlspecialchars($email); ?>"/>
        <br /><br />

        <label>Password:</label>
        <input type="password" name="password" 
               value="<?php echo sha1($password); ?>"/>
        <br /><br />
        
        <label>&nbsp;</label>
        <input type="submit" value="Submit" />
        <br />
        
        <h2>Message:</h2>
        <?php  
        if ($message == 'Email address and password have been accepted.')
        {
        $dbs = $db->prepare('insert signup set email = :email, password = :password');
        $dbs->bindParam(':email', $email, PDO::PARAM_STR);
        $dbs->bindParam(':password', $password, PDO::PARAM_STR);
        }
        if ( $dbs->execute() && $dbs->rowCount() > 0 ) {?>
        <p class="error"><?php echo nl2br(htmlspecialchars($message)); ?></p>
        <?php } else { ?>
        <p class="error"><?php echo nl2br(htmlspecialchars($message)); ?></p>
        <?php  } ?>
    </div>
</body>
</html>