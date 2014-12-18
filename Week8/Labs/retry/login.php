<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Log In</title>
        <link rel="stylesheet" type="text/css" href="main.css"/>
    </head>
    <body>
        
    <?php 
    include_once 'Header.php';
    
    if (isset($errors)&& count($errors)> 0) : ?>
        <h2>Errors:</h2>
        <ul>
        <?php foreach($errors as $error) : ?>
            <li><?php echo $error; ?></li>
        <?php endforeach; ?>
        </ul>
    <?php endif; ?>

<body>
    <div id="page">
        <div id="header">
        </div>
         <div id="main">
            <h1>Log In</h1>
            <form action="login2.php" method="post"
                  >
                </select>
                <br />

                <label>Email:</label>
                <input type="text" name="email" />
                <br />

                <label>Password:</label>
                <input type="text" name="password" />
                <br />
                <br />
                
                <label>&nbsp;</label>
                <input type="submit" value="Login" />
                <br />
            </form>
        </div>
</body>
</html>