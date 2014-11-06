<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Account Sign Up</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>

<body>
    <?php
        $email = '';
        $password = '';
        $phone = '';
            if ( empty($_POST) ){
                $email = $_POST['email'];
                $password = $_POST['password'];
                $phone = $_POST['phone'];
            }
        $heardSelected = filter_input(INPUT_POST, 'heard_from');
        $wants_updates = filter_input(INPUT_POST, 'wants_updates');
        $checked_text = 'checked="checked"';
        $contact_via = filter_input(INPUT_POST, 'contact_via');
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

        <label>Password:</label>
        <input type="password" name="password" value="<?php echo $password; ?>" class="textbox"/>
        <br />

        <label>Phone Number:</label>
        <input type="text" name="phone" value="<?php echo $phone; ?>" class="textbox"/>
    </fieldset>

    <fieldset>
    <legend>Settings</legend>

        <p>How did you hear about us?</p>
        <input type="radio" name="heard_from" value="Search Engine" 
               <?php if ($heardSelected === 'Search Engine'){ 
                    echo $checked_text; } ?>/> Search engine<br />
        <input type="radio" name="heard_from" value="Friend" 
                <?php if ($heardSelected === 'Friend'){ 
                    echo $checked_text; } ?>/> Word of mouth<br />
        <input type=radio name="heard_from" value="Other" 
               <?php if ($heardSelected === 'Other'){ 
                    echo $checked_text; } ?>/> Other<br />

        <p>Would you like to receive announcements about new products
           and special offers?</p>
        <input type="checkbox" name="wants_updates"
               <?PHP if ($wants_updates == 'on'){
                        echo 'checked="checked"';
                    } ?>/>YES, I'd like to receive
        information about new products and special offers.<br />

        <p>Contact via:</p>
        <select name="contact_via">
                <option value="email">Email
                <?php if ($contact_via === 'email'){ 
                    echo $contact_via; } ?></option>
                <option value="text">Text Message
                <?php if ($contact_via === 'text'){ 
                    echo $contact_via; } ?></option>
                <option value="phone">Phone
                <?php if ($contact_via === 'phone'){ 
                    echo $contact_via; } ?></option>
        </select>

        <p>Comments:</p>
        <textarea name="comments" rows="4" cols="50"><?php echo $comments;?></textarea>
    </fieldset>

    <input type="submit" value="Submit" />

    </form>
    <br />
    </div>
</body>
</html>