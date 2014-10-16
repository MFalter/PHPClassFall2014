<!DOCTYPE html>


<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <h1> My Form </h1>
        <form action ="#" method="post">
            First Name: <input type="text" name="fname" /> <br />
            Last Name: <input type="text" name="lname" /> <br />
            <input type="submit" />
        <form/>
        
        <?php
            var_dump($_POST); /* $POST works the same as GET but is more secure 
                               * since it works off the server and not the URL.  
                               * The user cannot see it.*/
           
           filter_input(INPUT_POST, 'fname'); // More secure
           // http://us3.php.net/manual/en/function.filter-input.php
           
           $errorMsg = '';
           
           if (!empty($_POST)){
           
           if (empty($_POST['fname'])=== true || empty($_POST['lname'])=== true){
               $errorMsg = 'You must enter a full name';
               echo '<p>', $errorMsg, '</p>';
                }
           }
           
           
           
           if (empty($_POST['fname'])=== false){
            echo $_POST['fname'];}
            
            if (isset($_POST['lname']) === true){
                echo $_POST['lname'];}
           
           
           if (empty($errorMsg)=== false){ 
               echo '<p>', $errorMsg, '</p>';
                }
           
           /*Some PHP functions
           /*empty /* a PHP global function
                  * http://us3.php.net/manual/en/function.empty.php
                  * Determine whether a variable is considered to be empty. 
                  * A variable is considered empty if it does not exist or if 
                  * its value equals FALSE. empty() does not generate a warning 
                  * if the variable does not exist.*/
           /*isset();
           is_string($var)
           is_numeric($var)*/
        ?>
    </body>
</html>
