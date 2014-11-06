<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        
        print_r($_POST);
        
         $comments = filter_input(INPUT_POST, 'comments');
         // Take away any HTML comments
         $comments = htmlspecialchars($comments);
         
         // Takes out code characters
         echo nl2br($comments);
        
        ?>
        
        
        
          <form action="#" method="post">
            <?PHP // The value here is not an attribute for text area.  
            // PHP goes between the <textarea></textarea>  ?>
              <textarea name="comments"><?php echo $comments;?></textarea>

              
<input type="submit" value="submit" />
            
            
        </form>
        
    </body>
</html>