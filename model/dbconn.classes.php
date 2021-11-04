<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set('display_startup_errors', 1);
class database{   
    private $host = "localhost";
    private $username_WB = "root";
    private $password_WB = "";
    private $db = "naplo";
    public $conn;
	public $log = array();
    public function connect(){
		/// PDO kapcsolatteremtés az adatbázissal.
        $this->conn = null;    
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db, $this->username_WB, $this->password_WB);
			$this->conn->exec('SET NAMES utf8');
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->conn->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND,'SET sql_mode="TRADITIONAL"');
			$this->log[] = "Csatlakozott az adatbazishoz.";
		
		}catch(PDOException $exception){
            echo "Adatbazis csatlakozasi hiba" . $exception->getMessage();
        }
       return $this->conn;
    }
}
?>