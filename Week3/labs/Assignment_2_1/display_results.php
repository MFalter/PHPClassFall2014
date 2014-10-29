<?php
// get data from the form
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email '];
$zipcode = $_POST['zipcode'];

// validate the fields are all filled in
$error_message = '';
if ( empty($name) ){
    $error_message = 'Name is a required field.';
} else if ( empty($phone) ){
    $error_message = 'Phone Number is a required field.';
} else if ( empty($email) ){
    $error_message = 'E-mail is a required field.';
} else if ( empty($zipcode) ){
    $error_message = 'Zip Code is a required field.';
}
// validate that the data entered is the correct format
else if ( !is_numeric($phone) ){
    $error_message = 'Invalid phone number.  Try using numbers only.';
} else if ( !is_numeric($zipcode) ){
    $error_message = 'Invalid zipcode.  Five numbers only please.';
} else if ( $phone > 99999 ){
    $error_message = 'Invalid zipcode.  Five numbers only please.';
} 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>User Data</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>

<body>
    <div id="content">
        <h1>User Data</h1>

        <label>Name:</label>
        <span><?php echo $name; ?></span><br />

        <label>Phone Number:</label>
        <span><?php echo $phone; ?></span><br />

        <label>E-Mail:</label>
        <span><?php echo $email; ?></span><br />

        <label>ZIP Code:</label>
        <span><?php echo $fzipcode; ?></span><br />
    </div>
</body>
</html>