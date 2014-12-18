<?php
if (!isset($_SESSION)) session_start();
if(!isset($_SESSION['loggedin']))
       header('Location: '.'login.php');
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>

<body>

<?php
include "header.php";
include './ValidatorClass.php';
?>

</body>
</html>