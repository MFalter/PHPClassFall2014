<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of FunctionsClass
 *
 * @author 001331285
 */
class validatorClass {
    
function checkLoginData($email, $password)
{
    $password = sha1($password);
    
    $db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
    $dbs = $db->prepare('select email, password FROM signup WHERE email = :email');
    $dbs->bindParam(':email', $email);
    $dbs->execute();
    $rows = $dbs->fetchAll();
    $dbs->closeCursor();
   
    foreach ($rows as $row) {
        if ($row['password'] == sha1($password)) {
            return true;}
    }
    return false;
}
function checkEmailRegistration($email)
{
    $db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
    $dbs = $db->prepare('select email, password from signup where email = :email');
    $dbs->bindParam(':email', $email);
    $dbs->execute();
    $rows = $dbs->fetchAll();
    $dbs->closeCursor();
    
    return count($rows)>0;
}
function validEmail($email)
{
   if (empty($email)) {
        return false;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    return true;
} 
function validPassword($password)
{
   if (empty($password)) {
        return false;
    } 
    if (strlen($password) < 4) {
        return false;
    }
    return true;
}
}
?>
