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
            
1. ford <input type="checkbox" name="tops[]" value="pep" /> <br />
2. chevy <input type="checkbox" name="tops[]" value="mush" checked="checked" /> <br />
3. honda <input type="checkbox" name="tops[]" value="olv" /> <br />

              
<input type="submit" value="submit" />
            
            
        </form>
        
    </body>
</html>