<?php
// Start the session
if (!isset($_SESSION)) session_start();
if(isset($_SESSION['loggedin']))
    echo "<a href ='login.php'> Logout </a> |";
else
    echo "<a href ='login.php'> Login </a> |";
?>

<a href ="signup.php"> Sign up </a>