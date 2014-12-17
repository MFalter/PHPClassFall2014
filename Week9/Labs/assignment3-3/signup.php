<?php
$message = 'Enter your desired email and password.';
$email = '';
$password = '';
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
// Function to check to see if email is all ready registered in the database.
function checkEmailRegistration($email) {
                                    
    $db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
    $dbs = $db->prepare('select email, password from signup where email = :email');
    $dbs->bindParam(':email', $email);
    $dbs->execute();
    $rows = $dbs->fetchAll();
    $dbs->closeCursor();
    
    return count($rows)>0;
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
else { // Only if entered data is valid
    if (checkLoginData($email, $password)) {
        $message = 'Membership confirmed.';
    } else if (checkEmailRegistration($email)) {
        $message = 'email is taken.';
    } else { // If email is available: register as a new user
                                     
        $db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
        $dbs = $db->prepare('insert into signup set email=:email, password= :password');
        $password = sha1($password);
        $dbs->bindParam(':email', $email, PDO::PARAM_INT);
        $dbs->bindParam(':password', $password, PDO::PARAM_INT);
        if ($dbs->execute() && $dbs->rowCount() > 0) {
            $message = 'Welcome to the club!';
        } else {
            $message = 'Signup Error.  Try again';
        }
    }
}
}
if(!in_array("Submit",$_POST) || !empty($message))
{?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>

<body>
    <div id="content">
        <h1>Sign Up</h1>
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

<?php } ?>