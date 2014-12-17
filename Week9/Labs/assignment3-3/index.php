<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>

<body>

<?php
include "header.php";
$message = 'Enter your email and password.';
$email = '';
$password = '';
?>
    
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Log In</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>

<body>
    <div id="content">
        <h1>Log In</h1>
        <form action="#" method="post">
        <input type="hidden" name="action" value="process_data"/>

        <label>E-Mail:</label>
        <input type="text" name="email" 
               value="<?php echo htmlspecialchars($email); ?>"/>
        <br />

        <label>Password:</label>
        <input type="password" name="password" 
               value="<?php echo htmlspecialchars($password); ?>"/>
        <br />

        <label>&nbsp;</label>
        <input type="submit" value="Submit" />
        <br />

        </form>
        
        <h2>Message:</h2>
        <p><?php echo nl2br(htmlspecialchars($message)); ?></p>
        
    </div>
</body>
</html>

</body>
</html>