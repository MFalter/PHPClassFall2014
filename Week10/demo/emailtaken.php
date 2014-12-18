<?php
function emailtaken( $email ) {
       
    $isTaken = false;
    $db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
    $dbs = $db->prepare('select email from signup '
                . 'where email = :email limit 1');
    $dbs->bindParam(':email', $email, PDO::PARAM_STR);
    if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
        $isTaken = true;
    }     
        
    return $isTaken;  
}
$email = filter_input(INPUT_POST, 'email');
$checkEmail = array( "taken" => 'Available',
                     "email" => $email 
                   );
if (emailtaken($email) === true ) {
  $checkEmail["taken"] = "UnAvailable";
}
echo json_encode($checkEmail);