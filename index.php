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

class Config {
    public function __construct(Env $env, Model $model) {
        echo 'Config DB is ready ..<br/>';
    }
}

class Model {
    public function __construct() {
        echo 'Model is ready <br/>';
    }
}

class Env {
    public function __construct() {
        echo 'Env is ready ..<br/>';
    }
}

class Cache {
    
    public function __construct() {
        echo 'Cache is ready .. <br/>';
    }

}