<?php
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
include 'checkStatus.php';
?>