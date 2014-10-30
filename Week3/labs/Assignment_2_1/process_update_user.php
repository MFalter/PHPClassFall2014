<?php
    // get the data from the form
    $id = $_POST['id'];
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
    
        //insert no where clause
    $db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
    $dbs = $db->prepare('update users set fullname = :fullname, email = :email, phone = :phone, zip = :zip WHERE id = :id');
    $dbs->bindParam(':id', $id, PDO::PARAM_INT);
    $dbs->bindParam(':fullname', $name, PDO::PARAM_STR);
    $dbs->bindParam(':email', $email, PDO::PARAM_STR);
    $dbs->bindParam(':phone', $phone_number, PDO::PARAM_STR);
    $dbs->bindParam(':zip', $zip_code, PDO::PARAM_STR);

    // $id won't work on add page
    if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
        echo '<h1> user ', $id,' was updated</h1>';
    } else {
      echo '<h1> user ', $id,' was <strong>NOT</strong> updated</h1>';
    }
    
?>
<a href="index.php">View Users</a>