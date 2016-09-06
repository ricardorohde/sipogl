<?php 
	date_default_timezone_set("Africa/Porto-Novo");

	require_once('dbconfig.php');

	class USER
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
		
		public function getAllRoles()
		{
			$Query_getAllRoles="SELECT * FROM roles WHERE status = 1";
			$stmt = $this->conn->prepare($Query_getAllRoles);								  
			$stmt->execute();	
			$RoleFetch = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			return $RoleFetch;
		}
		
		public function getUserById($id)
		{
			$Query_getUserById="SELECT * FROM users WHERE id =:id";
			$stmt = $this->conn->prepare($Query_getUserById);
			$stmt->bindparam(":id", $id);									  
			$stmt->execute();	
			$userFetch = $stmt->fetch(PDO::FETCH_ASSOC);
			
			return $userFetch;
		}
		
		public function doDeleteUserById($status, $id)
		{
			$Query_doDeleteUserById="UPDATE users SET status = :status WHERE id = :id";
			$stmt = $this->conn->prepare($Query_doDeleteUserById);
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
		
		public function doUpdateUserById($fullname, $sexe, $email, $phone, $status, $id,$role)
		{
			$Query_doUpdateById="UPDATE users SET fullname= :name, sexe =:sexe, email =:email, phone =:phone, status =:status  WHERE id =:id";
			$stmt = $this->conn->prepare($Query_doUpdateById);
			
			$stmt->bindparam(":name", $fullname);
			$stmt->bindparam(":sexe", $sexe);
			$stmt->bindparam(":email", $email);										  
			$stmt->bindparam(":phone", $phone);										  										  										  
			$stmt->bindparam(":status", $status);										  
			$stmt->bindparam(":id", $id);	
											  
			if($stmt->execute())
			{
				
				$Query_doUpdateRole="UPDATE user_role SET role_id =:role_id WHERE user_id =:id";
				$stmt = $this->conn->prepare($Query_doUpdateRole);
				$stmt->bindparam(":role_id", $role);
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
		
		
		public function doUserCount()
		{
			$Query_doUserCount="SELECT * FROM users ";
			$stmt = $this->conn->prepare($Query_doUserCount);								  
			$stmt->execute();	
			$usersCount = $stmt->rowCount();
			return $usersCount;
		}
		
		public function doRegister($fullname,$sexe,$email,$phone,$password,$status,$role)
		{
			try
			{
				
				$password = self::hashPassword($password);
				
				$Query_check_user="SELECT * FROM users WHERE phone =:phone OR email =:email";
				$stmt = $this->conn->prepare($Query_check_user);
				$stmt->bindparam(":phone", $phone);
				$stmt->bindparam(":email", $email);										  
				$stmt->execute();	

		
				if ($stmt->rowCount() == 0)
				{
				
					
					$datecreation = date("Y-m-d H:i:s");
					
					$Query_insert_user = "INSERT INTO users (fullname,sexe,email,phone,password,datecreation,status) VALUES (:fullname, :sexe, :email, :phone, :password, :datecreation, :status)";
					
					$stmt = $this->conn->prepare($Query_insert_user);
					$stmt->bindparam(":fullname", $fullname);
					$stmt->bindparam(":sexe", $sexe);
					$stmt->bindparam(":email", $email);										  
					$stmt->bindparam(":phone", $phone);										  
					$stmt->bindparam(":password", $password);										  
					$stmt->bindparam(":datecreation", $datecreation);										  
					$stmt->bindparam(":status", $status);										  
					
					if($stmt->execute())
					{
					
						$last_id = $this->conn->lastInsertId();
				
						$sql = "INSERT INTO user_role (user_id,role_id) VALUES (:user,:role)";
						$stmt = $this->conn->prepare($sql);
						
						$stmt->bindparam(":user", $last_id);									  										  
						$stmt->bindparam(":role", $role);
						
						if($stmt->execute())
						{
							$rep = true;
						}
						
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
			catch(PDOException $e)
			{
				echo $e->getMessage();
				return false;
			}				
		}
		
		
		public function getUsers()
		{
				$getUsersQuery = "SELECT * FROM users ";
				$stmt = $this->conn->prepare($getUsersQuery);
				$stmt->execute();
				$userRow=$stmt->fetchAll(PDO::FETCH_ASSOC);
		
				return json_encode($userRow);
		}
		
		
		public function hashPassword($passe)
		{
			$i = 0;
			
			while($i < 100)
			{
				$passe = md5(sha1($passe));	
				$i = $i + 1 ;
			}
			
			return $passe;
			
		}
		
		

		public function doLogin($emailtelephone, $password)
		{
			try
			{
				$password = self::hashPassword($password);
				
				//echo $password;
				
				$doLoginQuery = "SELECT * FROM users WHERE phone =:phone AND password =:password";
				$stmt = $this->conn->prepare($doLoginQuery);
				$stmt->execute(array(':phone'=>$emailtelephone, ':password'=>$password));
				$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
				
				//print_r($stmt->rowCount());
				
				if ($stmt->rowCount() > 0)
				{
					
					$_SESSION['login'] = true; // this login var will use for the session thing
					
					$_SESSION['uid'] = $userRow['id'];
					
					$_SESSION['start'] = time(); // Taking now logged in time.
										
					$_SESSION['expire'] = $_SESSION['start'] + (15 * 60); // Ending a session in 15 minutes from the starting time.
					
					return true;
				}
				else
				{
					return false;
				}
					
			}
			catch(PDOException $e)
			{
				return false;
				//echo $e->getMessage();
			}
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
	
	
?>
