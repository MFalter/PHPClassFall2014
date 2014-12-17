<?php
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');
$errors = array();

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
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');
$message = filter_input(INPUT_POST, 'message');

// Validate data
if (!validEmail($email)) {
    $errors .= 'Please enter a valid Email.';
} else if (!validPassword($password)) {
    $errors .= 'Please enter a valid Password.';
}
} else {
    $email = '';
    $password = '';
}
if (isset($email)&& count($errors)== 0){
    // Secure the password    
    $password = sha1($password);
    // If valid, add the email and password to the database
    $db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
    $dbs = $db->prepare('INSERT into signup set email = :email, password = :password');
    $dbs->bindParam(':email', $email, PDO::PARAM_STR);
    $dbs->bindParam(':password', $password, PDO::PARAM_STR);
    
    if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
        $message = "Welcome to the Site!";
    } else {
        $message = "There was an error processing your Sign up";
        var_dump($db->errorInfo());
    }
}
    include('signup.php'); ?>