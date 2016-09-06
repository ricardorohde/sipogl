<?php


	require_once('include/dbconfig.php');
	
	$resultat = array();
	
	
	$database = new Database();
	$db = $database->dbConnection();


	//$getdepartementsQuery = "SELECT r.id, r.name, r.status, rp.permission FROM roles r, role_permission rp WHERE r.id = rp.role_id AND r.id = rp.role_id ";
	$getdepartementsQuery = "SELECT d.id, d.name, d.datecreation, d.status FROM departement d WHERE d.status IN (0,1) ";
	$stmt = $db->prepare($getdepartementsQuery);
	$stmt->execute();
	$departementRow=$stmt->fetchAll(PDO::FETCH_ASSOC);
	//print_r($departementRow);
	foreach($departementRow as $key=>$value) 
	{
		$resultat[$key]['id'] = $value['id'];
		$resultat[$key]['label'] = $value['name'];
		$resultat[$key]['datecreation'] = $value['datecreation'];

		

		$resultat[$key]['status'] = (isSet($value['status']) AND $value['status']==1)?"<img src='assets/img/accept.png'/>":"<img src='assets/img/exclamation.png'/>";
		

		$resultat[$key]['update'] =  "<button class='btn btn-primary btn-xs'><a href='/departement.php?q=u&id=".$value['id']."' style='color:white;'><span class='glyphicon glyphicon-pencil'></span></a></button>";
        
	}

	echo json_encode($resultat);
?>

