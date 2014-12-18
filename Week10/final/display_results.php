<?php
// get the data from the form
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $heardSelected = filter_input(INPUT_POST, 'heard');
    $contact = filter_input(INPUT_POST, 'contact');
    $comments = filter_input(INPUT_POST, 'comments');
    $message = '';
    
// put the phone number in the proper format
    $phone = str_replace('.', '', $phone); // Delete all periods
    $phone = str_replace('(', '', $phone); // Delete all perenthesis
    $phone = str_replace(')', '', $phone); // Delete all perenthesis
    $phone = str_replace(' ', '', $phone); // Delete all spaces
    $phone = str_replace('-', '', $phone); // Delete all dashes

// for the heard_from radio buttons,
    if (isset($_POST['heard'])){
        $heardSelected = $_POST['heard'];
    }else {
    $heardSelected = "unknown";
    $message .= '<p>Please tell us how you heard about us.</p>';
    }    
    
// Strip the HTML from the comments   
    $comments = htmlspecialchars($comments, ENT_COMPAT, 'ISO-8859-1', false);
    $comments = nl2br($comments, false);
    
// Function to check if the email is valid
function validEmail($email) {
    if (empty($email)) {
        return false;
    } if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
        return true;
}

//function to check if the phone number is valid
function validPhoneNumber($phone){
    $i = strlen($phone); // Gets the length of the phone number  
    if (empty($phone)){
        return false;
    } if (!is_numeric($phone)){
        return false;
    } if ($i != 7 && $i != 10){ // Make sure it's 7 or 10 numbers
        return false;
    }
    return true;
}

// Function to check to see if email is all ready registered in the database.
function checkEmailRegistration($email) {
                                    
    $db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
    $dbs = $db->prepare('select email, password from account where email = :email');
    $dbs->bindParam(':email', $email);
    $dbs->execute();
    $rows = $dbs->fetchAll();
    $dbs->closeCursor();
    
    return count($rows)>0;
}

    // Validate data
if (!validEmail($email)) {
    $message .= '<p>Please enter a valid Email.</p>';
}  
if (!validPhoneNumber($phone)){
    $message .= '<p>Please enter a valid Phone Number.</p>';
}
else { // Only if entered data is valid
    if (checkEmailRegistration($email)) {
        $message = 'Email is taken.';
    } else { // If email is available: register as a new user
 
        // format the phone number like this 123-4567 or this 123-456-7890
        $i = strlen($phone); // Gets the length of the phone number    
        if ($i === 10) {
        $part1 = substr($phone, 0, 3);
        $part2 = substr($phone, 3, 3);
        $part3 = substr($phone, 6, 4);
        $phone = '('.$part1 . ')' . $part2 . '-' . $part3;}   
        if ($i === 7){
        $part1 = substr($phone, 0, 3);
        $part2 = substr($phone, 3, 4);
        $phone = $part1 . '-' . $part2;}
        
        $db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
        $dbs = $db->prepare('insert into account set email=:email, '
                . 'phone=:phone, heard=:heard, contact=:contact, '
                . 'comments=:comments');
        $dbs->bindParam(':email', $email, PDO::PARAM_STR);
        $dbs->bindParam(':phone', $phone, PDO::PARAM_STR);
        $dbs->bindParam(':heard', $heardSelected, PDO::PARAM_STR);
        $dbs->bindParam(':contact', $contact, PDO::PARAM_STR);
        $dbs->bindParam(':comments', $comments, PDO::PARAM_STR);
        if ($dbs->execute() && $dbs->rowCount() > 0) {
            $message = 'ok';
        } else {
            echo $message;
        }
    }
}   
?>
<?php
if ($message != 'ok')
{
    echo $message;
}
else { ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
         <title>Mailing List Results</title>
        <link rel="stylesheet" type="text/css" href="main.css"/>
    </head>
    <body>
        <?php include "header.php"; ?>
       <div id="content">
            <h1>Account Information</h1>

            <label>Email Address:</label>
            <span><?php echo htmlspecialchars($email); ?></span><br />
            
            <label>Phone Number:</label>
            <span><?php echo htmlspecialchars($phone); ?></span><br />

            <label>Heard From:</label>
            <span><?php echo $heardSelected; ?></span><br />

            <label>Contact Via:</label>
            <span><?php echo $contact; ?></span><br /><br />

            <label>Comments:</label>
            <span><?php echo $comments; ?></span><br />
            
            <?php
            if ($message != 'ok')
            { ?>
             <h2>Message:</h2>
            <p><?php echo nl2br(htmlspecialchars($message)); ?></p>   
            <?php } ?>
        </div>
    </body>
</html>
<?php } ?>