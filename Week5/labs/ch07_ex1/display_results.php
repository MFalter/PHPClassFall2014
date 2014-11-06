<?php
    // get the data from the form
    $email = $_POST['email'];
    
    // get the rest of the data for the form
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $heardSelected = filter_input(INPUT_POST, 'heard_from');
    $wants_updates = filter_input(INPUT_POST, 'wants_updates');
    $checked_text = 'checked="checked"';
    $contact_via = filter_input(INPUT_POST, 'contact_via');
    $comments = filter_input(INPUT_POST, 'comments');

    // for the heard_from radio buttons,
    // display a value of 'Unknown' if the user doesn't select a radio button
    if (isset($_POST['heard_from'])){
        $heardSelected = $_POST['heard_from'];
    }else {
    $heardSelected = "unknown";
    }
    
    // for the wants_updates check box,
    // display a value of 'Yes' or 'No'
    if ($wants_updates === 'on'){
              $wants_updates = 'yes';}
              else {$wants_updates = 'no';}
              
    // #8
    $comment = $_POST['comment'];
    $comment = htmlspecialchars($comment, ENT_COMPAT, 'ISO-8859-1', false);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Account Information</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<body>
    <div id="content">
        <h1>Account Information</h1>

        <label>Email Address:</label>
        <span><?php echo htmlspecialchars($email); ?></span><br />

        <label>Password:</label>
        <span><?php echo htmlspecialchars($password); ?></span><br />

        <label>Phone Number:</label>
        <span><?php echo htmlspecialchars($phone); ?></span><br />

        <label>Heard From:</label>
        <span><?php echo $heardSelected; ?></span><br />

        <label>Send Updates:</label>
        <span><?php echo $wants_updates; ?></span><br />

        <label>Contact Via:</label>
        <span><?php echo $contact_via; ?></span><br /><br />

        <span>Comments:</span><br />
        <span><?php echo $comments; ?></span><br />
        
        <p>&nbsp;</p>
    </div>
</body>
</html>