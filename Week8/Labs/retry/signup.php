<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sign Up</title>
        <link rel="stylesheet" type="text/css" href="main.css"/>
    </head>
    <body>
        
    <?php 
    include_once 'Header.php';
    ?>
        

<body>
    <div id="page">
        <div id="header">
        </div>
         <div id="main">
            <h1>Sign Up</h1>
            <form action="signup2.php" method="post"
                  >
                </select>
                <br />

                <label>email:</label>
                <input type="text" name="email" />
                <br />

                <label>password</label>
                <input type="text" name="password" />
                <br />
                
                <label>&nbsp;</label>
                <input type="submit" value="Login" />
                <br />
                
                <?php
                if (isset($errors)&& count($errors)> 0) : ?>
                <h2>Errors:</h2>
                <?php foreach($errors as $error) : 
                    echo $error;
                    endforeach;
                    endif; ?>
            </form>
        </div>
</body>
</html>
</html>