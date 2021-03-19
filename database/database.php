<?php
class Database{
    //Connecting the database
    //Database credentials
    private $host = "localhost";
    private $db_name = "agolos";
    private $username = "root";
    private $password = "";
    public $conn;
 
    //Get the database connection
    public function getConnection(){
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
			//echo "Database Connected";
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>