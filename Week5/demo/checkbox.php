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
            
1. ford <input type="checkbox" name="pep" /> <br />
2. chevy <input type="checkbox" name="mush" checked="checked" /> <br />
3. honda <input type="checkbox" name="olv" /> <br />

              
<input type="submit" value="submit" />
            
            
        </form>
        
    </body>
</html>