<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php     
            /*it's a good idea to set a default value for a variable you plan to
             * use.  If you try to use a variable in PHP that does not exist, you 
             * will get an error message.*/
            $fname = '';
            $lname = '';
            $errorMsg = '';
            if ( !empty($_POST) ) {
               $fname = $_POST['fname'];
               $lname = $_POST['lname']; }
            /*the include function will insert a block on code into this part
             * of the page.*/
            include './validation.php';
                        
            if ( empty($errorMsg) === false ) {
             echo '<p>', $errorMsg , '</p>';
            // exit();
         } ?>
        
        <h1> My Form </h1>
        <form action="#" method="post">            
           F Name: <input type="text" name="fname" value="<?php echo $fname; ?>" /> <br />
           L Name: <input type="text" name="lname" value="<?php echo $lname; ?>" /> <br />
            <input type="submit" />            
        </form>
    </body>
</html>
