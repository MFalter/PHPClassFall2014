<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"

Create a Signup web form (page) that will take in a email and password. 
Add Validation to check for an email 
and make sure a password greater than 4 characters are entered.  
Once everything is validated save the data into the data base.  
Before saving the password, make sure to hash the password using the sha1 function built into PHP.

Check Github for the SQL needed>

<?php
if (isset($_POST['action'])) {
    $action =  $_POST['action'];
} else {
    $action =  'start_app';
}

switch ($action) {
    case 'start_app':
        $email = '';
        $password = '';
        $message = 'Enter e-mail address and password';
        break;
    case 'process_data':
        $email = $_POST['email'];
        $email = trim($email); // Gets rid of spaces on the ends
        $password = $_POST['password'];
        $message = '';

        /*************************************************
         * validate and process the email address
         ************************************************/
        // make sure the user enters an email
        if (empty($email)){
            $message = 'You must enter your email address.';
        }
        // make sure the email address has at least one @ sign and one dot character
        $i = strpos($email, '.');
        if ($i === false){
            $message = 'No period(.) was found in the email address';
        }
        $i = strpos($email, '@');
        if ($i === false){
            $message = 'No @ was found in the email address';
        }
        if ($message == "") {
            $message = 'Email address and password have been accepted.';
        }
        
        /*************************************************
         * validate and process the password
         ************************************************/
        // Make sure the password is at least 4 characters
        $i = strlen($password);
        if ($i < 4){
            $message = 'Password is too short.';
        }
        $password = sha1($password);
        break;
}
include 'display_results.php';
?>