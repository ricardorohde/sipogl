<?php 


	require_once('dbconfig.php');

	class Departement
	{	

		private $conn;
		
		public function __construct()
		{
			$database = new Database();
			$db = $database->dbConnection();
			$this->conn = $db;
		}
		
		public function runQuery($sql)
		{
			$stmt = $this->conn->prepare($sql);
			return $stmt;
		}
		
		public function doUpdateDepartementById($name, $status, $id)
		{
			
			if(!empty($name) AND $status != "")
			{
			
				$Query_doUpdateById="UPDATE departement SET name=:name, status =:status  WHERE id =:id";
				$stmt = $this->conn->prepare($Query_doUpdateById);
				
				$stmt->bindparam(":name", $name);										  										  										  
				$stmt->bindparam(":status", $status);										  
				$stmt->bindparam(":id", $id);	
												  
				if($stmt->execute())
				{
					return true;
				}
				else
				{
					return false;
				}
					
			}
			else
			{
				return false;
			}
			
		}
		
		public function getdepartementById($updateId)
		{
			$sql = "SELECT * FROM departement d  WHERE d.id = :updateId";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindparam(":updateId", $updateId);		
			$stmt->execute();	
			$roleFetch = $stmt->fetch(PDO::FETCH_ASSOC);
			
			return $roleFetch;
		}
		
		public function doDepartement($name, $datecreation, $status)
		{
			
			$rep = false;
			
			if(!empty($name) AND $status != "")
			{
			
				$Query_doinsertRole = "INSERT INTO departement (name, datecreation, status) VALUES (:name, :datecreation, :status)";
				
				$stmt = $this->conn->prepare($Query_doinsertRole);
				$stmt->bindparam(":name", $name);									  
				$stmt->bindparam(":datecreation", $datecreation);										  
				$stmt->bindparam(":status", $status);
				
				if($stmt->execute())
				{
					
					$rep = true;
					
					
				}										  
			}
			
			return 	$rep;
		}
		
		
		public function getAllDepartement()
		{
			$Query_getAlldepartement="SELECT * FROM departement WHERE status = 1 ";
			$stmt = $this->conn->prepare($Query_getAlldepartement);								  
			$stmt->execute();	
			$Alldepartement = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $Alldepartement;
		}
		
		public function getAllDepartementDetails($id)
		{
			$Query_getAlldepartementDetails="SELECT g.name, g.color, gd.name as gouvdetal FROM departement g, departement_details gd WHERE g.id = gd.departement_id AND g.status = 1 AND gd.status = 1 AND gd.departement_id =:id";
			$stmt = $this->conn->prepare($Query_getAlldepartementDetails);	
			$stmt->bindparam(":id", $id);							  
			$stmt->execute();	
			$rep = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $rep;
		}
		
		
		public function doDepartementCount()
		{
			$Query_dodepartementCount="SELECT * FROM departement ";
			$stmt = $this->conn->prepare($Query_dodepartementCount);								  
			$stmt->execute();	
			$departementCount = $stmt->rowCount();
			return $departementCount;
		}
		
	}
	
	
?>
