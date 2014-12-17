<?php 
$message = 'Enter your email and password.';?>
<html>
    <head>
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>
    <body>
    
    <?php 
            include_once 'header.php';
            
        if (isset($errors)&& count($errors)> 0) : ?>
        <h2>Errors:</h2>
        <ul>
        <?php foreach($errors as $error) : ?>
            <li><?php echo $error; ?></li>
        <?php endforeach; ?>
        </ul>
    <?php endif; ?>

<body>
    <div id="content">
            <h1>Sign Up</h1>
            <form action="signup2.php" method="post">
            <input type="hidden" name="action" value="process_data"/>
                <br />
                
                <label>E-Mail:</label>
                <input type="text" name="email" />
                <br />

                <label>Password:</label>
                <input type="text" name="password" />
                <br />
                <br />
 
                <label>&nbsp;</label>
                <input type="submit" value="Submit" />
                <br />
            </form>
            <h2>Message:</h2>
            <p><?php echo nl2br(htmlspecialchars($message)); ?></p>
        </div>
        
</body>
</html>