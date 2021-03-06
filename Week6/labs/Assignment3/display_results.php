<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
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
        
        $db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
        $dbs = $db->prepare('select * from signup');
        
        if (!empty ($password))
        {
            $password = sha1($password);
        }
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
        <input type="text" name="password" 
               value="<?php echo htmlspecialchars($password); ?>"/>
        <br /><br />
        
        <label>&nbsp;</label>
        <input type="submit" value="Submit" />
        <br />
        
        <h2>Message:</h2>
        <?php  
        if ($message == 'Email address and password have been accepted.')
        {
        $password = sha1($password);
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