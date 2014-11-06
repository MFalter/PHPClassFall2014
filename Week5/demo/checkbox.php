<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        
        print_r($_POST);
        
         $pep = filter_input(INPUT_POST, 'pep');
         $mush = filter_input(INPUT_POST, 'mush');
         $olv = filter_input(INPUT_POST, 'olv');
        
        ?>
        
          <form action="#" method="post">
            <?PHP // Value is optional but will always return as "on" or "off""?>
1. pepperoni <input type="checkbox" name="pep" 
                    <?PHP if ($pep == 'on'){
                        echo 'checked="checked"';
                    } ?> /><br />
2. mushroom <input type="checkbox" name="mush" checked="checked" 
                   <?PHP if ($mush == 'on'){
                        echo 'checked="checked"';
                    } ?> /><br />
3. olive <input type="checkbox" name="olv" 
                <?PHP if ($olv == 'on'){
                        echo 'checked="checked"';
                    } ?> /><br />              
<input type="submit" value="submit" />
            
            
        </form>
        
    </body>
</html>