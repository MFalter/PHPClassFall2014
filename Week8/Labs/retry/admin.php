<?php
        if ($_SESSION['loggedin'] != true) {
           header('Location: login.php');
        } ?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>

<body>

<?php include "header.php"; ?>
    
    <h1> Admin Page </h1>

</body>
</html>