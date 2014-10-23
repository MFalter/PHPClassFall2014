<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Product Discount Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body>
    <?php
    // Get the data from the form
    $product_description = $_POST['product_description'];
    $list_price = $_POST['list_price'];
    $discount_percent = $_POST['discount_percent'];
    
    // Make sure Description is not empty and it is a string
    $errorMsg = '';
    if (empty($_POST['product_description']) === true){
        $errorMsg = 'You must provide a description';
        }
    else if (!is_string($product_description) || is_numeric($product_description)) {
        $errorMsg = 'Invalid Description';
        }
    else if (!is_numeric($list_price)){
        $errorMsg = 'List Price must be a numeric value';
        }
    else if (!is_numeric($discount_percent)){
        $errorMsg = 'Discount Percent must be a numeric value';
        }
    else {
        $errorMsg = '';
        }
        
    if ($errorMsg != '' ) {
        include('index.php');
        exit();
         }
         
    // Calculate the discount
    $discount = $list_price * $discount_percent * .01;
    $discount_price = $list_price - $discount;
    
    // Format for currancy and percentages
    $list_price_formatted = "$".  number_format($list_price, 2);
    $discount_percent_formatted = $discount_percent."%";
    $discount_formatted = "$". number_format($discount, 2);
    $discount_price_formatted = "$".  number_format($discount_price, 2);
    ?>
    
    <div id="content">
        <h1>Product Discount Calculator</h1>

        <label>Product Description:</label>
        <span><?php echo $product_description; ?></span><br />

        <label>List Price:</label>
        <span><?php echo $list_price_formatted; ?></span><br />

        <label>Standard Discount:</label>
        <span><?php echo $discount_percent_formatted; ?></span><br />

        <label>Discount Amount:</label>
        <span><?php echo $discount_formatted; ?></span><br />

        <label>Discount Price:</label>
        <span><?php echo $discount_price_formatted; ?></span><br />
                                        
        <p>&nbsp;</p>
    </div>
</body>
</html>

