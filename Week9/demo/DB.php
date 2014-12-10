<?php

/**
 * Description of DB
 *
 * @author 001331285
 */
class DB {
    
    private $PDO = null;
    
    function __construct() {
        $this->setPDO();
    }
    public function getPDO() {
        return $this->PDO;
    }
    private function setPDO() {
        $this->PDO = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
    }
}
