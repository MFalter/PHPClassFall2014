<?php

class Util {
    //put your code here
    
    /**
    * A  method to check if a Post request has been made.
    *    
    * @return boolean
    */    
    public  function isPostRequest() {
        return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
    }
    
    /**
    * A  method to check if a Get request has been made.
    *    
    * @return boolean
    */    
    public  function isGetRequest() {
        return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET' );
    }
    
       
    public  function redirect($page) {
        //if ( Validator::pageIsValid($name))
        header("location: $page.php");
        die();
    }
    
    
    public  function confirmAccess() {
        if ( !isset($_SESSION['isloggedin']) || !$_SESSION['isloggedin'] ) {
           Util::redirect('index');
        }
    }
    
}