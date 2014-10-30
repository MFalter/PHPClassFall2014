<?php
    // get the data from the form
    $name = $_POST['name'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $zip_code = $_POST['zip_code'];

    // Make sure all text boxes have data entered and it is of the correct type
    $error_message = '';
    if ( empty($name) ){
        $error_message = $error_message.'<p class="error">Name is a required field.</p>';
    } if ( empty($phone_number) ){
        $error_message = $error_message.'<p class="error">Phone Number is a required field.</p>';
    } else if ( !is_numeric($phone_number) ){
        $error_message = $error_message.'<p class="error">Phone number invalid.  Try 10 digits only.</p>';
    } if ( empty($email) ){
        $error_message = $error_message.'<p class="error">Email is a required field.</p>';
    } if ( empty($zip_code) ){
        $error_message = $error_message.'<p class="error">Zip Code is a required field.</p>';
    } else if ( !is_numeric($zip_code) ){
        $error_message = $error_message.'<p class="error">Zip Code invalid.  Try 5 digits only.</p>';
    }
    
     // Set error message to empty string if no invalid entries
    else {
        $error_message = ''; }

    // if an error message exists, go to the index page
    if ($error_message != '') {
        include('adduser.php');
        exit();}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Future Value Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>

<body>
    <div id="content">
        <h1>User Data</h1>

        <label>Name:</label>
        <span><?php echo $name; ?></span><br />

        <label>Phone Number:</label>
        <span><?php echo $phone_number; ?></span><br />

        <label>Email:</label>
        <span><?php echo $email; ?></span><br />

        <label>Zip Code:</label>
        <span><?php echo $zip_code; ?></span><br />
    </div>
<a href="index.php">View Users</a>
</body>
</html>