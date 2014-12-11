<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Sign In</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<body>
    <div id="content">
        <h1>Sign In</h1>
        <?php 
        include_once "functions.php";
        // get the data from the form
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    $message = "Enter a Valid Email and Password";
    
    if (!empty ($password)) {
            $password = sha1($password);
        }
    if (empty($_POST) ) {
            if ( empty ($email) )
            { $email = ""; }
            if ( empty($password) )
            { $password = ""; }
        } 
        
        if ($email != ""){
            $taken_emailandpassword = check_EmailAndPassword_Exist($email, $password);
        
            if ($taken_emailandpassword === true) {
                $message = "Email and Password are a match";
            }
            if ($taken_emailandpassword === false) {
            $message = "Email and Password not found";
            }
        }
        
        ?>
        
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
        
        <h2>Message:</h2>
        <p class="error"><?php echo nl2br(htmlspecialchars($message)); ?></p>
        
        <label>&nbsp;</label>
        <input type="submit" value="Submit"/>
        <br />
        <a href="sign_up.php">Not a member?</a> 
    </div>
</body>
</html>