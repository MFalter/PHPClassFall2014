<?php
    // get the data from the form
    $id = $_POST['id'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = sha1($password);

    // Make sure all text boxes have data entered and it is of the correct type
    $error_message = '';
    if ( empty($name) ){
        $error_message = $error_message.'<p class="error">Email is a required field.</p>';
    } if ( empty($password) ){
        $error_message = $error_message.'<p class="error">Password is a required field.</p>';
    }     
     // Set error message to empty string if no invalid entries
    else {
        $error_message = ''; }

    // if an error message exists, go to the index page
    if ($error_message != '') {
        include('search_email.php');
        exit();}
    
        //insert no where clause
    $db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
    $dbs = $db->prepare('update signup set email = :email, password = :password WHERE id = :id');
    $dbs->bindParam(':id', $id, PDO::PARAM_INT);
    $dbs->bindParam(':email', $email, PDO::PARAM_STR);
    $dbs->bindParam(':password', $password, PDO::PARAM_STR);

    // $id won't work on add page
    if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
        echo '<h1> user ', $email,' was updated</h1>';
    } else {
      echo '<h1> user ', $email,' was <strong>NOT</strong> updated</h1>';
    }
    
?>
<a href="index.php">View Users</a>