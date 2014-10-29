<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
         <?php
         
            /*
             * Arrays in PHP are set this way.  You can have an index or
             * an assocative array (keys that are not numbers.)
             */
            $arr = array();
            $arr['hello'] = 'hi';
            $arr['hi'] = 'how are you';
            $arr[0] = 'zero';
            $arr[0] = 'zerozero';
            
            var_dump($arr);
            
            /*
             * Rather than for loops use for each loops in PHP
             * to access the Keys and values of each index
             */
            foreach($arr as $key => $value) {
                echo '<p>', $key , ' = ', $value, '</p>';
            }
            
            /*
             * If you do not need the key you can just get the value.
             */
            foreach($arr as $value) {
                echo '<p>', $value, '</p>';
            }
            
            
        ?>  
        
       
    </body>
</html>