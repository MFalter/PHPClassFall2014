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
                <input type="radio" name="heard" value="Search Engine" 
                    <?php if ($heardSelected === 'Search Engine'){ 
                    echo $heardSelected; } ?>/> Search engine<br />
                <input type="radio" name="heard" value="Friend" 
                    <?php if ($heardSelected === 'Friend'){ 
                    echo $heardSelected; } ?>/> Word of mouth<br />
                <input type=radio name="heard" value="Other" 
                       <?php if ($heardSelected === 'Other'){ 
                    echo $heardSelected; } ?>/> Other<br />

                <p>Contact via:</p>
                <select name="contact">
                    <option value="email">Email
                    <?php if ($contact === 'email'){ 
                        echo $contact; } ?></option>
                    <option value="text">Text Message
                    <?php if ($contact === 'text'){ 
                        echo $contact; } ?></option>
                    <option value="phone">Phone
                    <?php if ($contact === 'phone'){ 
                        echo $contact; } ?></option>
                </select>

                <p>Comments: (optional)</p>
                <textarea name="comments" rows="4" cols="50"><?php echo $comments;?></textarea>
            </fieldset>

            <input type="submit" value="Submit" />

            </form>
            <br />
        </div>
    </body>
</html>