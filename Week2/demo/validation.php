<?php
if ( !empty($_POST) ) {

    if ( empty($_POST['fname']) === false ) {
        echo $_POST['fname'];
    } else {
        $errorMsg = 'First name is empty'; }

    if ( empty($_POST['lname']) === false ) {
        echo $_POST['lname'];
    } else {
        $errorMsg = 'Last name is empty'; }
}
// isset checks if the value exists at all
// empty checks to see if it's empty