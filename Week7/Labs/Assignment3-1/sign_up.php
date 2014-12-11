<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<body>
    <div id="content">
        <h1>Sign Up</h1>
        <?php 
        include_once "functions.php";
        // get the data from the form
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    $message = "Enter an Email";
    
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
        $taken_email = check_email_taken($email);

        if ($taken_email === true){
            $message = "Email is taken.";
        }
        if ($taken_email === false) {
            $message = "Email is good.";
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
        <a href="Login_form.php">All ready a member?</a> 
    </div>
</body>
</html>