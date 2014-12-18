<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mailing List</title>
        <link rel="stylesheet" type="text/css" href="main.css"/>
    </head>
    <body>
            <?php
            include "header.php";
            if (empty($_POST)) {
                $email = '';
                $phone = '';
                $message = '';
            }
        $heardSelected = filter_input(INPUT_POST, 'heard');
        $contact = filter_input(INPUT_POST, 'contact');
        $comments = filter_input(INPUT_POST, 'comments');
        ?>
         <div id="content">
            <h1>Account Sign Up</h1>
            <form action="display_results.php" method="post">

            <fieldset>
            <legend>Account Information</legend>
                <label>E-Mail:</label>
                <input type="text" name="email" value="<?php echo $email; ?>" class="textbox"/>
                <br />

                <label>Phone Number:</label>
                <input type="text" name="phone" value="<?php echo $phone; ?>" class="textbox"/>
            </fieldset>

            <fieldset>
            <legend>Settings</legend>

                <p>How did you hear about us?</p>
                <input type="radio" name="heard" <?php if (isset($heardSelected) && $heardSelected=="Search Engine") echo "checked";?> 
                       value="Search Engine" /> Search engine<br />
                <input type="radio" name="heard" <?php if (isset($heardSelected) && $heardSelected=="Friend") echo "checked";?>
                       value="Friend" /> Word of mouth<br />
                <input type=radio name="heard" <?php if (isset($heardSelected) && $heardSelected=="Other") echo "checked";?>
                       value="Other" /> Other<br />

                <p>Contact via:</p>
                <select name="contact">
                    <option <?php if (isset($contact) && $contact=="email") echo "selected";?> 
                        value="email">Email</option>
                    <option <?php if (isset($contact) && $contact=="text") echo "selected";?>  
                        value="text">Text Message</option>
                    <option <?php if (isset($contact) && $contact=="phone") echo "selected";?>  
                        value="phone">Phone</option>
                </select>

                <p>Comments: (optional)</p>
                <textarea name="comments" rows="4" cols="50"><?php echo $comments;?></textarea>
            </fieldset>

            <input type="submit" value="Submit" />

            <?php 
            if ($message != '')
            { ?>
            </br>
                <h2>Message:</h2>
                <p><?php echo nl2br(htmlspecialchars($message)); ?></p>
            <?php } ?>
            
            </form>
            <br />
        </div>
    </body>
</html>