<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"
    
Create a Signup web form (page) that will take in a email and password. 
Add Validation to check for an email 
and make sure a password greater than 4 characters are entered.  
Once everything is validated save the data into the data base.  
Before saving the password, make sure to hash the password using the sha1 function built into PHP.

Check Github for the SQL needed>

<?php
    // get the data from the form
    
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Account Information</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<body>
    <div id="content">
        <h1>Account Information</h1>
        <form action="." method="post">
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
        <p><?php echo nl2br(htmlspecialchars($message)); ?></p>
    </div>
</body>
</html>