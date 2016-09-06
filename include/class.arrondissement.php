<?php 


	require_once('dbconfig.php');

	class arrondissement
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
		
		public function doUpdatearrondissementById($name, $departement, $genre, $residence, $contact, $fonction, $datedebut, $datefin, $datecreation, $status, $id)
		{
			$Query_doUpdateById="UPDATE arrondissement SET name=:name, commune_id =:departement, genre =:genre, residence =:residence, contact =:contact, fonction =:fonction, datedebut =:datedebut, datefin =:datefin, status =:status  WHERE id =:id";
			$stmt = $this->conn->prepare($Query_doUpdateById);
			 
			$stmt->bindparam(":name", $name);									  
			$stmt->bindparam(":departement", $departement);									  
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
		
		public function getarrondissementById($updateId)
		{
			$sql = "SELECT * FROM arrondissement d  WHERE d.id = :updateId";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindparam(":updateId", $updateId);		
			$stmt->execute();	
			$roleFetch = $stmt->fetch(PDO::FETCH_ASSOC);
			
			return $roleFetch;
		}
		
		public function doInsertarrondissement($name, $commune, $genre, $residence, $contact, $fonction, $datedebut, $datefin, $datecreation, $status)
		{

			$rep = false;
			
			
			if(!empty($name) AND !empty($commune) AND !empty($genre) AND !empty($residence) AND !empty($contact) AND !empty($fonction) AND !empty($datedebut) AND !empty($datefin) AND $status != '')
			{
			
				$Query_doinsertRole = "INSERT INTO arrondissement (name, commune_id, genre, residence, contact, fonction, dateDebut, dateFin, datecreation, status) VALUES (:name, :commune, :genre, :residence, :contact, :fonction, :datedebut, :datefin, :datecreation, :status)";
				
				$stmt = $this->conn->prepare($Query_doinsertRole);
				$stmt->bindparam(":name", $name);									  
				$stmt->bindparam(":commune", $commune);									  
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
			}
			
			return 	$rep;
		}
		
		
		public function getAllarrondissement()
		{
			$Query_getAllarrondissement="SELECT * FROM arrondissement WHERE status = 1 ";
			$stmt = $this->conn->prepare($Query_getAllarrondissement);								  
			$stmt->execute();	
			$Allarrondissement = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $Allarrondissement;
		}
		
		public function getAllarrondissementDetails($id)
		{
			$Query_getAllarrondissementDetails="SELECT g.name, g.color, gd.name as gouvdetal FROM arrondissement g, arrondissement_details gd WHERE g.id = gd.arrondissement_id AND g.status = 1 AND gd.status = 1 AND gd.arrondissement_id =:id";
			$stmt = $this->conn->prepare($Query_getAllarrondissementDetails);	
			$stmt->bindparam(":id", $id);							  
			$stmt->execute();	
			$rep = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $rep;
		}
		
		
		public function doarrondissementCount()
		{
			$Query_doarrondissementCount="SELECT * FROM arrondissement ";
			$stmt = $this->conn->prepare($Query_doarrondissementCount);								  
			$stmt->execute();	
			$arrondissementCount = $stmt->rowCount();
			return $arrondissementCount;
		}
		
	}
	
	
?>
