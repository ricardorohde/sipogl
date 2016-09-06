<?php

	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', 'root');
	define('DB_DATABASE', 'oop_log_mod');
	
	class Database
	{   
		
		private $host      	   = DB_SERVER;
		private $username      = DB_USERNAME;
		private $password      = DB_PASSWORD;
		private $db_name       = DB_DATABASE;
		
		public $conn;
		 
		public function dbConnection()
		{
		 
			$this->conn = null;    
			try
			{
				$this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
				$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
			}
			catch(PDOException $exception)
			{
				echo "Connection error: " . $exception->getMessage();
			}
			 
			return $this->conn;
		}
	}
?>
