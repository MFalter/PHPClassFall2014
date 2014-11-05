<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        
        //print_r($_POST); //print_r displays arrays
        
        $carSelected = filter_input(INPUT_POST, 'cars');

        ?>
        
          <form action="#" method="post">
            
1. ford <input type="radio" name="cars" value="ford" 
                <?php if ($carSelected == "ford"){ echo 'checked="checked"'; } ?>/><br />
2. chevy <input type="radio" name="cars" value="chevy"
                <?php if ($carSelected == "chevy"){ echo 'checked="checked"'; } ?>/> <br />
3. honda <input type="radio" name="cars" value="honda"
                <?php if ($carSelected == "honda"){ echo 'checked="checked"'; } ?>/> <br />

              
<input type="submit" value="submit" />
            
            
        </form>
        
    </body>
</html>