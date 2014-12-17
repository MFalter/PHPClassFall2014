<?php

$message = 'Enter your email and password.';
$email = '';
$password = '';

 // remove all session variables
if (!isset($_SESSION)) session_start();
session_unset();
session_destroy();

// Function to check to see if the email and password exist
function checkLoginData($email, $password) {
                                      
    $db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
    $dbs = $db->prepare('select email, password FROM signup WHERE email = :email');
    $dbs->bindParam(':email', $email);
    $dbs->execute();
    $rows = $dbs->fetchAll();
    $dbs->closeCursor();
   
    foreach ($rows as $row) {
        if ($row['password'] == sha1($password)) {
            return true;}
    }
    return false;
}

// Function to check if the email is valid
function validEmail($email) {
    if (empty($email)) {
        return false;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    return true;
}

// Function to check if a password is valid
function validPassword($password) {
    if (empty($password)) {
        return false;
    }
    if (strlen($password) < 4) {
        return false;
    }
    return true;
}

include "header.php";
if(in_array("Submit",$_POST))
{
//Get values from the form
$message = '';
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');

// Validate data
if (!validEmail($email)) {
    $message .= 'Please enter a valid Email.';
}
else if (!validPassword($password)) {
    $message .= 'Please enter a valid Password.';
}
}

if(!in_array("Submit",$_POST) || !empty($message))
{?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Log In</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>

<body>
    <div id="content">
        <h1>Log In</h1>
        <form action="admin.php" method="post">
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

<?php } ?>