<?php

/**
 * method = function
 * property = value
 * 
 * Must declare functions either:
 * private- only the class can use it.  Nothing else outside of it.
 *          Good vor variables and some functions
 * public- allows outside functions or other classes to access it.
 *          Good for things you don't want accessed.
 */
class Sample {
    
    private $db = 'database'; // Good practice to make them private.
    
    public function getDb() {
        return $this->db;
    }

    public function setDb($db) {
        if (!is_null($db)) {
        $this->db = $db; // This keyword refers to anything within the class.
        return true;
        }
        return false;
    }
    
    /**
     * Will Echo out "say something"
     * 
     * @return null
     */
    
    public function say() {
        echo 'say something';
    }
}

/**
 * If there is ever a file that's all php and no html, don't close the <?php.
 * It's for security reasons.
 */