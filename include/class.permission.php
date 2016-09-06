<?php

	require_once('dbconfig.php');

	class PermissionUser 
	{
		
		private $roles;

		private $conn;
		
		public function __construct()
		{
			$database = new Database();
			$db = $database->dbConnection();
			$this->conn = $db;
		}

		// override User method
		public static function getByUsername($username) {
			$sql = "SELECT * FROM users WHERE username = :username";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute(array(":username" => $username));
			$result = $stmt->fetchAll();

			if (!empty($result)) {
				$privUser = new PrivilegedUser();
				$privUser->user_id = $result[0]["user_id"];
				$privUser->username = $username;
				$privUser->password = $result[0]["password"];
				$privUser->email_addr = $result[0]["email_addr"];
				$privUser->initRoles();
				return $privUser;
			} else {
				return false;
			}
		}

		// populate roles with their associated permissions
		protected function initRoles() {
			$this->roles = array();
			$sql = "SELECT t1.role_id, t2.role_name FROM user_role as t1
					JOIN roles as t2 ON t1.role_id = t2.role_id
					WHERE t1.user_id = :user_id";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute(array(":user_id" => $this->user_id));

			while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$this->roles[$row["role_name"]] = Role::getRolePerms($row["role_id"]);
			}
		}

		// check if user has a specific privilege
		public function hasPrivilege($perm) {
			foreach ($this->roles as $role) {
				if ($role->hasPerm($perm)) {
					return true;
				}
			}
			return false;
		}
		
		// check if a user has a specific role
		public function hasRole($role_name) {
			return isset($this->roles[$role_name]);
		}
		
		public function doPermissionCount()
		{
			$Query_doPermissionCount="SELECT * FROM permissions ";
			$stmt = $this->conn->prepare($Query_doPermissionCount);								  
			$stmt->execute();	
			$permissionsCount = $stmt->rowCount();
			return $permissionsCount;
		}
		
		public function doUpdatePermissionById($nom, $status, $id)
		{
			$Query_doUpdateById="UPDATE permissions SET name= :name, status = :status WHERE id = :id";
			$stmt = $this->conn->prepare($Query_doUpdateById);
			$stmt->bindparam(":name", $nom);									  
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
		
		public function getPermissionById($id)
		{
			$Query_getPermissionById="SELECT * FROM permissions WHERE id =:id";
			$stmt = $this->conn->prepare($Query_getPermissionById);
			$stmt->bindparam(":id", $id);									  
			$stmt->execute();	
			$userFetch = $stmt->fetch(PDO::FETCH_ASSOC);
			
			return $userFetch;
		}

		// insert a new role permission association		
		public function doInsertPermission($name, $datecreation, $status) {
			$Query_insert_permission = "INSERT INTO permissions (name, datecreation, status) VALUES (:name, :datecreation, :status)";
			
			$stmt = $this->conn->prepare($Query_insert_permission);
			$stmt->bindparam(":name", $name);									  
			$stmt->bindparam(":datecreation", $datecreation);										  
			$stmt->bindparam(":status", $status);										  
			
			
			return $stmt->execute();	
			//$stmt = $this->conn->prepare($sql);
			//return $stmt->execute(array(":name" => $name, ":datecreation" => $datecreation, ":status" => $status));
		}
		
		
		public static function insertPerm($role_id, $perm_id) {
			$sql = "INSERT INTO role_perm (role_id, perm_id) VALUES (:role_id, :perm_id)";
			$stmt = $this->conn->prepare($sql);
			return $stmt->execute(array(":role_id" => $role_id, ":perm_id" => $perm_id));
		}

		// delete ALL role permissions
		public static function deletePerms() {
			$sql = "TRUNCATE role_perm";
			$stmt = $this->conn->prepare($sql);
			return $stmt->execute();
		}
		
		
		public function is_loggedin()
		{
			if(isset($_SESSION['login']))
			{
				return true;
			}
		}
		
		public function redirect($url)
		{
			header("Location: $url");
		}
		
		public function doLogout()
		{
			session_destroy();
			unset($_SESSION['login']);
			return true;
		}
		
	}
