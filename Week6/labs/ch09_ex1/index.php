<?php
if (isset($_POST['action'])) {
    $action =  $_POST['action'];
} else {
    $action =  'start_app';
}

switch ($action) {
    case 'start_app':
        $message = 'Enter some data and click on the Submit button.';
        break;
    case 'process_data':
        $name = $_POST['name'];
        $name = trim($name); // Gets rid of spaces on the ends
        $email = $_POST['email'];
        $email = trim($email); // Gets rid of spaces on the ends
        $phone = $_POST['phone'];
        $phone = trim($phone); // Gets rid of spaces on the ends
        $message = '';

        /*************************************************
         * validate and process the name
         ************************************************/
        // 1. make sure the user enters a name
        if (empty($name)){
            $message = 'You must enter your name.';
        }

        // 2. display the name with only the first letter capitalized
        $name = strtolower($name); // First convert all letter to lowercase
        $name = ucwords($name); // Then capitalize only the first letters/
        $i = strpos($name, ' ' ); // Will give you the position of the space to signify end of first name
        $first_name = substr($name, 0, $i); // First name starts as the first letter and ends at the space
        
        /*************************************************
         * validate and process the email address
         ************************************************/
        // 1. make sure the user enters an email
        if (empty($email)){
            $message = 'You must enter your email address.';
        }
        // 2. make sure the email address has at least one @ sign and one dot character
        $i = strpos($email, '@');
        if ($i === false){
            $message = 'No @ was found in the email address';
        }
        $i = strpos($email, '.');
        if ($i === false){
            $message = 'No period(.) was found in the email address';
        }
            
        /*************************************************
         * validate and process the phone number
         ************************************************/
        
        $phone = str_replace('.', '', $phone); // Delete all periods
        $phone = str_replace('(', '', $phone); // Delete all perenthesis
        $phone = str_replace(')', '', $phone); // Delete all perenthesis
        $phone = str_replace(' ', '', $phone); // Delete all spaces
        $phone = str_replace('-', '', $phone); // Delete all dashes
        $i = strlen($phone); // Gets the length of the phone number    
        // 1. make sure the user enters at least seven digits, not including formatting characters
        if (empty($phone)){
            $message = 'You must enter your phone number.';
        }
        else if (!is_numeric($phone)){ // Check to make sure the phone number only has digits in it
           $message = 'You must enter a valid phone number.'; 
        }
        else if ($i != 7 && $i != 10){ // Make sure it's 7 or 10 numbers
           $message = 'Please enter only 7 or 10 numbers';
        }

        // 2. format the phone number like this 123-4567 or this 123-456-7890
        if ($i === 10) {
        $part1 = substr($phone, 0, 3);
        $part2 = substr($phone, 3, 3);
        $part3 = substr($phone, 6, 4);
        $phone = $part1 . '-' . $part2 . '-' . $part3;}   
        if ($i === 7){
        $part1 = substr($phone, 0, 3);
        $part2 = substr($phone, 3, 4);
        $phone = $part1 . '-' . $part2;}
        
        /*************************************************
         * Display the validation message
         ************************************************/
        if ($message === ''){
        $message = "Hello $first_name,\n\n" .
                   "Thank you for entering this data:\n\n" .
                   "Name: $name \n".
                   "Email: $email \n".
                   "Phone: $phone";
        }

        break;
}
include 'string_tester.php';
?>