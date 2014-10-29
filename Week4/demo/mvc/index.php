<?php

include 'views/header.php';

$action = 'home';

if ( !empty($_POST) && isset($_POST['action']) ) {
    $action = $_POST['action'];
    //filter_input(INPUT_POST, 'action')
} else if ( !empty($_GET) && isset($_GET['action']) ) {
    $action = $_GET['action'];
    //filter_input(INPUT_GET, 'action')
}
if ( $action === 'view_products' ) {
    echo 'view_products';
    
} else if ( $action === 'add_products' ) {
    echo 'add_products';
} else {
    echo 'home';
    // home
}

include 'views/footer.php';