<?php


	require_once('include/dbconfig.php');
	
	$resultat = array();
	$status_array = array(0 => 'Inactif',1 => 'Actif');
	
	$database = new Database();
	$db = $database->dbConnection();


	$getUsersQuery = "SELECT u.id, u.fullname, u.sexe, u.email, u.phone, u.status, r.name FROM users u, user_role ur, roles r WHERE u.id = ur.user_id AND r.id = ur.role_id ";
	$stmt = $db->prepare($getUsersQuery);
	$stmt->execute();
	$userRow=$stmt->fetchAll(PDO::FETCH_ASSOC);
	
	foreach($userRow as $key=>$value) 
	{
		$resultat[$key]['id'] = $value['id'];
		$resultat[$key]['fullname'] = $value['fullname'];
		$resultat[$key]['sexe'] = $value['sexe'];
		$resultat[$key]['email'] = $value['email'];
		$resultat[$key]['phone'] = $value['phone'];
		$resultat[$key]['name'] = $value['name'];
		
		
		//$resultat[$key]['status'] = $status_array[$value['status']];
		$resultat[$key]['status'] = (isSet($value['status']) AND $value['status']==1)?"<img src='assets/img/accept.png'/>":"<img src='assets/img/exclamation.png'/>";
		

		$resultat[$key]['update'] =  "<button class='btn btn-primary btn-xs'><a href='/utilisateur.php?q=u&id=".$value['id']."' style='color:white;'><span class='glyphicon glyphicon-pencil'></span></a></button>";
        //$resultat[$key]['delete'] =  "<button class='btn btn-danger btn-xs' ><a href='/utilisateur.php?q=d&id=".$value['id']."' style='color:white;'><span class='glyphicon glyphicon-trash'></span></a></button>";

	}

	echo json_encode($resultat);
?>

