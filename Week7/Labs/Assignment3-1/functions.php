<?php
        // Function to search the database to see if the email is in use 
        function check_EmailAndPassword_Exist($email, $password){
            $db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
            $dbs = $db->prepare("select * from signup WHERE email = :email and password= :password");
            
            $dbs->bindParam(':email', $email, PDO::PARAM_INT);
            $dbs->bindParam(':password', $password, PDO::PARAM_INT);

            if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
            return true;
            }
            return false;
        }

        // Function to search the database to see if the email is in use 
        function check_email_taken($email){
            $db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
            $dbs = $db->prepare("select * from signup WHERE email = :email");
            
            $dbs->bindParam(':email', $email, PDO::PARAM_INT);

            if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
            return true;
            }
            return false;
        }
        
        // Function to check email for valid characters
        function email_validation($email){
            // make sure the email address has at least one @ sign and one dot(.) character
            $i = strpos($email, '.');
                if ($i === false){
                    return false;
                }
            $i = strpos($email, '@');
                if ($i === false){
                    return false;
                }
                    return true;
        }   
        
        // Function to check that the password is over 4 characters long
        function password_validation($password){
            $i = strlen($password);
                if ($i < 4){
                    return false;
                }
                    return true;
        }
?>

