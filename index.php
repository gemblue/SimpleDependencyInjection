<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'Container.php';

/**
 * Usage
 */
class User {
    
    public $db;

    public function __construct(Db $db, $config = 'NULL', Cache $cache) 
    {    
        $this->db = $db;

        echo "User with config {$config} was constructed <br/>";
    }

    public function register($name) {
        $this->db->execute("INSERT INTO user SET name={$name}");
    }
}

class DB {
    
    public function __construct(Config $config) {
        
    }
    
    public function execute($sql) {
        echo "{$sql} <br/>";
    }
}
