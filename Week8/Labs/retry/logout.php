<?php
include './Header.php';
unset($_SESSION['loggedin']); 

header('Location: login.php');
?>