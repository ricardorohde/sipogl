<?php
	
	require_once('dbconfig.php');

	class ROLE
	{
		private $permissions;
		private $conn;

		public function __construct() 
		{
			$database = new Database();
			$db = $database->dbConnection();
			$this->conn = $db;
			
			$this->permissions = array();
		}
		
		
		
		public function doUpdateRoleById($name, $status, $id,$permission)
		{
			$Query_doUpdateById="UPDATE roles SET name=:name, status =:status  WHERE id =:id";
			$stmt = $this->conn->prepare($Query_doUpdateById);
			
			$stmt->bindparam(":name", $name);										  										  										  
			$stmt->bindparam(":status", $status);										  
			$stmt->bindparam(":id", $id);	
											  
			if($stmt->execute())
			{
				
				$Query_doUpdateRole="UPDATE role_permission SET permission =:permission WHERE role_id =:id";
				$stmt = $this->conn->prepare($Query_doUpdateRole);
				$stmt->bindparam(":permission", $permission);
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
		
		

		// return a role object with associated permissions
		public function getRolePerms($role_id) 
		{
			$sql = "SELECT r.name, r.status, rp.permission FROM roles r, role_permission rp  WHERE r.id = rp.role_id AND rp.role_id = :role_id";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindparam(":role_id", $role_id);		
			$stmt->execute();	
			$roleFetch = $stmt->fetch(PDO::FETCH_ASSOC);
			
			return $roleFetch;
			
		}

		// check if a permission is set
		public function hasPerm($permission) 
		{
			return isset($this->permissions[$permission]);
		}
		
		
		// insert a new role
		/*public static function doInsertRole($name) 
		{
			$sql = "INSERT INTO roles (name) VALUES (:name)";
			$stmt = $this->conn->prepare($sql);
			return $stmt->execute(array(":name" => $name));
		}*/
		
		public function doInsertRole($name, $datecreation, $status, $permission)
		{
			
			$rep = false;
			
			if(!empty($name) AND $status != "" AND count($permission)!=0)
			{
				$Query_doinsertRole = "INSERT INTO roles (name, datecreation, status) VALUES (:name, :datecreation, :status)";
				
				$stmt = $this->conn->prepare($Query_doinsertRole);
				$stmt->bindparam(":name", $name);									  
				$stmt->bindparam(":datecreation", $datecreation);										  
				$stmt->bindparam(":status", $status);
				
				if($stmt->execute())
				{
					
					$last_id = $this->conn->lastInsertId();
					
					$sql = "INSERT INTO role_permission (role_id,permission) VALUES (:role,:permission)";
					$stmt = $this->conn->prepare($sql);
					
					$stmt->bindparam(":role", $last_id);									  										  
					$stmt->bindparam(":permission", $permission);
					
					if($stmt->execute())
					{
						$rep = true;
					}
					
				}	
			}									  
			
			
			return 	$rep;
		}
		
		public function doRoleCount()
		{
			$Query_doRoleCount="SELECT * FROM roles ";
			$stmt = $this->conn->prepare($Query_doRoleCount);								  
			$stmt->execute();	
			$roleCount = $stmt->rowCount();
			return $roleCount;
		}
		
		public function getAllPermission()
		{
			$Query_getAllPermission="SELECT * FROM permissions WHERE status = 1";
			$stmt = $this->conn->prepare($Query_getAllPermission);								  
			$stmt->execute();	
			$PermissionFetch = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			return $PermissionFetch;
		}
		
		
		

		// insert array of roles for specified user id
		public static function insertUserRoles($user_id, $roles) 
		{
			
			
			
			$sql = "INSERT INTO user_role (user_id, role_id) VALUES (:user_id, :role_id)";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(":user_id", $user_id, PDO::PARAM_STR);
			$stmt->bindParam(":role_id", $role_id, PDO::PARAM_INT);
			foreach ($roles as $role_id) {
				$stmt->execute();
			}
			return true;
		}

		// delete array of roles, and all associations
		public static function deleteRoles($roles) 
		{
			$sql = "DELETE t1, t2, t3 FROM roles as t1
					JOIN user_role as t2 on t1.role_id = t2.role_id
					JOIN role_perm as t3 on t1.role_id = t3.role_id
					WHERE t1.role_id = :role_id";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(":role_id", $role_id, PDO::PARAM_INT);
			foreach ($roles as $role_id) {
				$stmt->execute();
			}
			return true;
		}

		// delete ALL roles for specified user id
		public static function deleteUserRoles($user_id) 
		{
			$sql = "DELETE FROM user_role WHERE user_id = :user_id";
			$stmt = $this->conn->prepare($sql);
			return $stmt->execute(array(":user_id" => $user_id));
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
