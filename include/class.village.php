<?php 


	require_once('dbconfig.php');

	class Village
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
		
		public function doUpdatevillageById($name, $arrondissement, $genre, $residence, $contact, $fonction, $datedebut, $datefin, $datecreation, $status, $id)
		{
			$Query_doUpdateById="UPDATE villages_quartiers SET name=:name, arrondissement_id =:arrondissement, genre =:genre, residence =:residence, contact =:contact, fonction =:fonction, datedebut =:datedebut, datefin =:datefin, status =:status  WHERE id =:id";
			$stmt = $this->conn->prepare($Query_doUpdateById);
			 
			$stmt->bindparam(":name", $name);									  
			$stmt->bindparam(":arrondissement", $arrondissement);									  
			$stmt->bindparam(":genre", $genre);									  
			$stmt->bindparam(":residence", $residence);									  
			$stmt->bindparam(":contact", $contact);									  
			$stmt->bindparam(":fonction", $fonction);									  
			$stmt->bindparam(":datedebut", $datedebut);									  
			$stmt->bindparam(":datefin", $datefin);									  										  
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
		
		public function getvillageById($updateId)
		{
			$sql = "SELECT * FROM villages_quartiers d  WHERE d.id = :updateId";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindparam(":updateId", $updateId);		
			$stmt->execute();	
			$roleFetch = $stmt->fetch(PDO::FETCH_ASSOC);
			
			return $roleFetch;
		}
		
		public function doInsertvillage($name, $arrondissement, $genre, $residence, $contact, $fonction, $datedebut, $datefin, $datecreation, $status)
		{

			$rep = false;
			
			$Query_doinsertRole = "INSERT INTO villages_quartiers (name, arrondissement_id, genre, residence, contact, fonction, dateDebut, dateFin, datecreation, status) VALUES (:name, :arrondissement, :genre, :residence, :contact, :fonction, :datedebut, :datefin, :datecreation, :status)";
			
			$stmt = $this->conn->prepare($Query_doinsertRole);
			$stmt->bindparam(":name", $name);									  
			$stmt->bindparam(":arrondissement", $arrondissement);									  
			$stmt->bindparam(":genre", $genre);									  
			$stmt->bindparam(":residence", $residence);									  
			$stmt->bindparam(":contact", $contact);									  
			$stmt->bindparam(":fonction", $fonction);									  
			$stmt->bindparam(":datedebut", $datedebut);									  
			$stmt->bindparam(":datefin", $datefin);									  
			$stmt->bindparam(":datecreation", $datecreation);										  
			$stmt->bindparam(":status", $status);
			
			if($stmt->execute())
			{
				
				$rep = true;
				
				
			}										  
			
			
			return 	$rep;
		}
		
		
		public function getAllvillage()
		{
			$Query_getAllvillage="SELECT * FROM villages_quartiers WHERE status = 1 ";
			$stmt = $this->conn->prepare($Query_getAllvillage);								  
			$stmt->execute();	
			$Allvillage = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $Allvillage;
		}
		
		public function getAllvillageDetails($id)
		{
			$Query_getAllvillageDetails="SELECT g.name, g.color, gd.name as gouvdetal FROM village g, village_details gd WHERE g.id = gd.village_id AND g.status = 1 AND gd.status = 1 AND gd.village_id =:id";
			$stmt = $this->conn->prepare($Query_getAllvillageDetails);	
			$stmt->bindparam(":id", $id);							  
			$stmt->execute();	
			$rep = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $rep;
		}
		
		
		public function dovillageCount()
		{
			$Query_dovillageCount="SELECT * FROM villages_quartiers ";
			$stmt = $this->conn->prepare($Query_dovillageCount);								  
			$stmt->execute();	
			$villageCount = $stmt->rowCount();
			return $villageCount;
		}
		
	}
	
	
?>
