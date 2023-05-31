<?php
class Database {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "crud_ecommerce";
    protected $conn;

    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn){
           echo "Connection success";
        }
        elseif($this->conn->connect_error) {
            echo ("Connection failed: " . $this->conn->connect_error);
        }
    }
}
// $total= new Database();
?>
