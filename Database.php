<?php
// Enables MySQLi error reporting to throw exceptions for errors or strict SQL issues.
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
/**
 * The Database class implements a singleton pattern to manage database connections.
 */
class Database {
	// Holds the singleton instance of the Database class.
    private static $instance = null;
	// The MySQLi connection resource.
    private $conn;
	// Database connection parameters.
    private $servername = "localhost";
    private $username = "books";
    private $password = "password";
    private $dbname = "book";
    /**
     * The constructor is private to prevent creating instances outside of the class.
     * Initializes the MySQLi connection.
     */
    private function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    /**
     * Returns the singleton instance of the Database class.
     * If the instance doesn't exist, creates it.
     * 
     * @return Database The singleton instance.
     */
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }
    /**
     * Returns the database connection object.
     * 
     * @return mysqli The database connection.
     */
    public function getConnection() {
        return $this->conn;
    }

    
}