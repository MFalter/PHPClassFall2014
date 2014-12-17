<?php
// Get data from the POST
$category_id = $_POST['category_id'];
$name = $_POST['name'];

if (empty($name)) {
    $error = "Invalid category data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');
    $query = "INSERT INTO categories (categoryName)
              VALUES ('$name')";
    $db->exec($query);
    
    include('category_list.php');
}?>
