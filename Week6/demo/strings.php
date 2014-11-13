<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        /*Strings */
            $my_str1 = 'string1'; // Single quotes are better
            $my_str2 = "single $my_str1"; // Double quotes will try to parse PHP data
            $my_str3 = 'single '. $my_str1; // Can concatinate using a period
            $my_str4 = 'single ${my_str1}'; // Curly braces around the variable makes it more readable
            $my_str5 = "single ${my_str1}"; // 
        
            echo $my_str2;
            echo '<br />', $my_str3; // A comma before the variable will echo without parsing it so it's faster.
            echo '<br />',$my_str4;
            echo '<br />',$my_str5;
            
        /*Shortcut allowing you to do multiple line statements without using echo every time */
    //heredoc
$str = <<<END
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>${my_str1}</title>
    </head>
    <body>
END;
                    
            echo $str;
            
        /* sha1 will make it so an encripted variable can't be unencripted.  It's a one way encription*/
            $password = 'test';
            // $password = sha1($password);  //To make them the same
            
            echo '<br />';
            echo '<br />';
            echo md5($password);
            echo '<br />';
            echo sha1($password);
            echo '<br />';
            echo '<br />';
            
            $dbPass = 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3'; // Will return the same hash for the same string
            if (sha1($password) === $dbPass){
            echo 'correct password';
            }
            
            echo '<br />';
            echo '<br />';
            //echo strlen(sha1($password)); // built in function to ge the length
            
            /* Substring */
            echo sha1($password);
            echo '<br />';
            echo '<br />';
            echo substr($dbPass, 20, 10); // First number is where to start, second is how many to return.  Will return all if no second number.
            echo '<br />';
            echo '<br />';
            $email = 'test@test.com';
            echo strpos($email, '@' ); // Will give you the string position.
            echo '<br />';
            echo '<br />';
            echo str_shuffle($email); // Shuffles it
            echo '<br />';
            echo str_word_count($email); // Looks for spaces
            echo '<br />';
            echo strrev($email); // Reverses the string
            echo '<br />';
            
        ?>
    </body>
</html>