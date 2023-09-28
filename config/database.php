<?php
class Database {
    private static $instance;
    private $db;

    private function __construct() {
        $this->db = new SQLite3('database.sqlite3');
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getDB() {
        return $this->db;
    }
}
?>
