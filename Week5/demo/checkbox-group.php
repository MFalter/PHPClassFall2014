<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        
        print_r($_POST);
        
         $tops = filter_input(INPUT_POST, 'tops');
         
        
        ?>
        
          <form action="#" method="post">
            <?PHP //put a name in an array in the post?>
1. pepperoni <input type="checkbox" name="tops[]" value="pep" /> <br />
2. mushroom <input type="checkbox" name="tops[]" value="mush" checked="checked" /> <br />
3. olive <input type="checkbox" name="tops[]" value="olv" /> <br />

              
<input type="submit" value="submit" />
            
            
        </form>
        
    </body>
</html>