<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
<?php
include_once "functions.php";
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
        if (!empty($email)){
            $email_valid = email_validation($email);
        
            if ($email_valid === true) {
                $message = "Email address has been accepted.";
            }
            if ($email_valid === false) {
            $message = "Enter a valid email address";
            }
        }
        else if (empty($email)){
            $message = 'You must enter your email address.';
        }

        /*************************************************
         * validate and process the password
         ************************************************/
        if (!empty($password)){
            $password_valid = password_validation($password);
        
            if ($password_valid === true) {
                $message = "";
            }
            if ($password_valid === false) {
            $message = 'Password is too short.';
            }
        }
        else if (empty($password)){
            $message = 'You must enter a password.';
        }
        
        if ($message == "") {
            $message = 'Email address and password have been accepted.';
        }
        
        $password = sha1($password);
        break;
}
include 'login.php';
?>