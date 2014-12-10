<?php
    // get the data from the form
    $name = filter_input(INPUT_POST, 'name');
    $phone_number = filter_input(INPUT_POST, 'phone_number');
    $email = filter_input(INPUT_POST, 'email');
    $zip_code = filter_input(INPUT_POST, 'zip_code');

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

    // if an error message exists, go to the index page
    if ($error_message != '') {
        include('adduser.php');
        exit();}
        
    if ($error_message == '')
    {
    
    $db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
    $dbs = $db->prepare('insert users set fullname = :fullname, email = :email, phone = :phone, zip = :zip');
        
    $dbs->bindParam(':fullname', $name, PDO::PARAM_STR);
    $dbs->bindParam(':email', $email, PDO::PARAM_STR);
    $dbs->bindParam(':phone', $phone_number, PDO::PARAM_STR);
    $dbs->bindParam(':zip', $zip_code, PDO::PARAM_STR);
    
    if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
        echo '<h1> User ', $name,' was added</h1>';
    } else {
      echo '<h1> User ', $name,' was <strong>NOT</strong> added</h1>';
    }    
        
    }
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>User Data Display</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>

<body>
    <div id="content">
        <h1>User Data Display</h1>

        <label>Email:</label>
        <span><?php echo $email; ?></span><br />

        <label>Password:</label>
        <span><?php echo $password; ?></span><br />
        
        <br />
        
        <h2>Message:</h2>
        <?php if ($message != 'Email address and password have been accepted.') { ?>
        <p class="error"><?php echo nl2br(htmlspecialchars($message)); ?></p>
        <?php }  ?>
        <?php if ($message == 'Email address and password have been accepted.') { ?>
        <p class="error"><?php echo nl2br(htmlspecialchars($message)); ?></p>
        <?php  
        $dbs = $db->prepare('insert signup set fullname = :fullname, email = :email, phone = :phone, zip = :zip');?> 
        <?php } ?>
    </div>
<a href="index.php">View Users</a>
</body>
</html>