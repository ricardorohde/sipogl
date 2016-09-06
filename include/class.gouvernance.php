<?php 


	require_once('dbconfig.php');

	class Gouvernance
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
		
		public function getAllGouvernance()
		{
			$Query_getAllGouvernance="SELECT * FROM gouvernance WHERE status = 1 ";
			$stmt = $this->conn->prepare($Query_getAllGouvernance);								  
			$stmt->execute();	
			$AllGouvernance = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $AllGouvernance;
		}
		
		public function getAllGouvernanceDetails($id)
		{
			$Query_getAllGouvernanceDetails="SELECT g.id as gouv_id, gd.id, g.name, g.color, gd.name as gouvdetal FROM gouvernance g, gouvernance_details gd WHERE g.id = gd.gouvernance_id AND g.status = 1 AND gd.status = 1 AND gd.gouvernance_id =:id";
			$stmt = $this->conn->prepare($Query_getAllGouvernanceDetails);	
			$stmt->bindparam(":id", $id);							  
			$stmt->execute();	
			$rep = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $rep;
		}
		
		
		//Les calculs
		public function getAllGouvernanceDetailsById($gouv_id, $id)
		{
			$Query_getAllGouvernanceDetails="SELECT g.id as gouv_id, gd.id, g.name, g.color, gd.name as gouvdetal FROM gouvernance g, gouvernance_details gd WHERE g.id = gd.gouvernance_id AND g.status = 1 AND gd.status = 1 AND gd.gouvernance_id =:gouv_id AND gd.id =:id";
			$stmt = $this->conn->prepare($Query_getAllGouvernanceDetails);	
			$stmt->bindparam(":id", $id);							  
			$stmt->bindparam(":gouv_id", $gouv_id);							  
			$stmt->execute();	
			$rep = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $rep;
		}
		
		
		public function getAllGouvernanceDetailsDescription($id)
		{
			$Query_getAllGouvernanceDetails="SELECT gdd.id, gdd.name, gd.id as gouv_details_id, gd.name as gouv_details_name, gd.gouvernance_id FROM gouvernance_details_description gdd, gouvernance_details gd WHERE gd.id = gdd.gouvernance_details_id AND gd.status = 1 AND gdd.status = 1 AND gdd.gouvernance_details_id =:id";
			$stmt = $this->conn->prepare($Query_getAllGouvernanceDetails);	
			$stmt->bindparam(":id", $id);							  
			$stmt->execute();	
			$rep = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $rep;
		}
		
	}
	
	
?>
