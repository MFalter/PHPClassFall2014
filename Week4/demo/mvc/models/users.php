<?php

// Never use global databases.  It is a bad practice to get in to.
// It's ok to do for this class but it's hard to keep track of because
// everyone can touch it and edit it.

// C.R.U.D. Create, Read, Update, Delete... four things you want to do with a database

function read_users() { // Cannot access variable inside without accessing the function.
    global $db; // gloabl database connects to the one outside the function
    $results = array(); // Sets it to an empty array to give it something to return
    $dbs = $db->prepare('select * FROM users'); // database statement
    
    if ( $dbs-> execute() && $dbs->rowCount() > 0){
        $results = $dbs->fetchAll(PDO::FETCH_ASSOC);// set the $results to what is pulled from the database
    }
    return $results;
}

function read_user( $id) {
    global $db;
    $results = array();
    $dbs = $db->prepare('select * FROM users WHERE id = :id');
    $dbs->bindParam(':id', )
    if ( $dbs-> execute() && $dbs->rowCount() > 0){
        $results = $dbs->fetch(PDO::FETCH_ASSOC);
    }
    return $results;
}