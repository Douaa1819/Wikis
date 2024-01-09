
<?php
define('host', 'localhost');
define('database', 'wiki');

define('user', 'root');

define('password', '');

class Database {
    private static $instance;
    private $connection;

    private function __construct() {
        $this->connection = new PDO("mysql:host=localhost;dbname=wiki", "root","");
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
}





