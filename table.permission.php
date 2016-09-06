<?php


	require_once('include/dbconfig.php');
	
	$resultat = array();
	$status_array = array(0 => 'Inactif',1 => 'Actif');
	
	$database = new Database();
	$db = $database->dbConnection();


	$getPermissionsQuery = "SELECT id, name, status FROM permissions ";
	$stmt = $db->prepare($getPermissionsQuery);
	$stmt->execute();
	$userRow=$stmt->fetchAll(PDO::FETCH_ASSOC);
	
	foreach($userRow as $key=>$value) 
	{
		$resultat[$key]['id'] = $value['id'];
		$resultat[$key]['name'] = $value['name'];

		$resultat[$key]['status'] = (isSet($value['status']) AND $value['status']==1)?"<img src='assets/img/accept.png'/>":"<img src='assets/img/exclamation.png'/>";
		

		$resultat[$key]['update'] =  "<button class='btn btn-primary btn-xs'><a href='/permission.php?q=u&id=".$value['id']."' style='color:white;'><span class='glyphicon glyphicon-pencil'></span></a></button>";
        //$resultat[$key]['delete'] =  "<button class='btn btn-danger btn-xs' ><a href='/permission.php?q=d&id=".$value['id']."' style='color:white;'><span class='glyphicon glyphicon-trash'></span></a></button>";

	}

	echo json_encode($resultat);
?>

