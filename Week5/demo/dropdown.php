<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        
        print_r($_POST);
        
         $card = filter_input(INPUT_POST, 'card');
         
        
        ?>
        
          <form action="#" method="post">
            <?PHP //same logic as the check boxes but "selected" instead of "checked" ?>
<select name="card">
    <option value="visa">Visa</option>
    <option value="mastercard" selected="selected">MasterCard</option>
    <option value="discover">Discover</option>
</select>

              
<input type="submit" value="submit" />
            
            
        </form>
        
    </body>
</html>