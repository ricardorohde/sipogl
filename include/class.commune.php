<?php 


	require_once('dbconfig.php');

	class Commune
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
		
		public function doUpdatecommuneById($name, $departement, $genre, $residence, $contact, $fonction, $datedebut, $datefin, $datecreation, $status, $id)
		{
			$Query_doUpdateById="UPDATE communes SET name=:name, departement_id =:departement, genre =:genre, residence =:residence, contact =:contact, fonction =:fonction, datedebut =:datedebut, datefin =:datefin, status =:status  WHERE id =:id";
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
		
		public function getcommuneById($updateId)
		{
			$sql = "SELECT * FROM communes d  WHERE d.id = :updateId";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindparam(":updateId", $updateId);		
			$stmt->execute();	
			$roleFetch = $stmt->fetch(PDO::FETCH_ASSOC);
			
			return $roleFetch;
		}
		
		public function doInsertcommune($name, $departement, $genre, $residence, $contact, $fonction, $datedebut, $datefin, $datecreation, $status)
		{

			$rep = false;
			
			if(!empty($name) AND !empty($departement) AND !empty($genre) AND !empty($residence) AND !empty($contact) AND !empty($fonction) AND !empty($datedebut) AND !empty($datefin) AND $status != '')
			{
			
				$Query_doinsertRole = "INSERT INTO communes (name, departement_id, genre, residence, contact, fonction, dateDebut, dateFin, datecreation, status) VALUES (:name, :departement, :genre, :residence, :contact, :fonction, :datedebut, :datefin, :datecreation, :status)";
				
				$stmt = $this->conn->prepare($Query_doinsertRole);
				$stmt->bindparam(":name", $name);									  
				$stmt->bindparam(":departement", $departement);									  
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
		
		
		public function getAllcommune()
		{
			$Query_getAllcommune="SELECT * FROM communes WHERE status = 1 ";
			$stmt = $this->conn->prepare($Query_getAllcommune);								  
			$stmt->execute();	
			$Allcommune = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $Allcommune;
		}
		
		public function getAllcommuneDetails($id)
		{
			$Query_getAllcommuneDetails="SELECT g.name, g.color, gd.name as gouvdetal FROM communes g, commune_details gd WHERE g.id = gd.commune_id AND g.status = 1 AND gd.status = 1 AND gd.commune_id =:id";
			$stmt = $this->conn->prepare($Query_getAllcommuneDetails);	
			$stmt->bindparam(":id", $id);							  
			$stmt->execute();	
			$rep = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $rep;
		}
		
		
		public function docommuneCount()
		{
			$Query_docommuneCount="SELECT * FROM communes ";
			$stmt = $this->conn->prepare($Query_docommuneCount);								  
			$stmt->execute();	
			$communeCount = $stmt->rowCount();
			return $communeCount;
		}
		
	}
	
	
?>
