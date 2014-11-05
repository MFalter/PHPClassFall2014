
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $textfield = '';
        $passwordfield = '';
        $hiddenfield = 'Hey Im here';
        
            if ( empty($_POST) ){
                $textfield = $_POST['textfield'];
                $passwordfield = $_POST['passwordfield'];
                $hiddenfield = $_POST['hiddenfield'];
            }
        ?>
        <?php // # sends the data back to the same page ?>
        <form action="#" method="post">
            <label>Text</label>
            <input type="text" name="textfield" value="<?php echo $textfield; ?>"/><br />
            <label>Password</label>
            <input type="password" name="passwordfield" value="<?php echo $passwordfield; ?>"/><br />
            <label>Hidden</label>
            <input type="hidden" name="hiddenfield" value="<?php echo $hiddenfield; ?>"/><br />
            <input type="submit" value="submit" />
        </form>
            
            
        
    </body>
</html>
