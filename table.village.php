<?php


	require_once('include/dbconfig.php');
	
	$resultat = array();
	
	
	$database = new Database();
	$db = $database->dbConnection();


	$getvillageQuery = "SELECT * FROM villages_quartiers d WHERE d.status IN (0,1) ";
	$stmt = $db->prepare($getvillageQuery);
	$stmt->execute();
	$villageRow=$stmt->fetchAll(PDO::FETCH_ASSOC);
	//print_r($villageRow);
	foreach($villageRow as $key=>$value) 
	{
		$resultat[$key]['id'] = $value['id'];
		$resultat[$key]['label'] = $value['name'];
		$resultat[$key]['genre'] = $value['genre'];
		$resultat[$key]['residence'] = $value['residence'];
		$resultat[$key]['fonction'] = $value['fonction'];
		$resultat[$key]['contact'] = $value['contact'];
		$resultat[$key]['datedebut'] = $value['dateDebut'];
		$resultat[$key]['datefin'] = $value['dateFin'];
		$resultat[$key]['datecreation'] = $value['datecreation'];

		

		$resultat[$key]['status'] = (isSet($value['status']) AND $value['status']==1)?"<img src='assets/img/accept.png'/>":"<img src='assets/img/exclamation.png'/>";
		

		$resultat[$key]['update'] =  "<button class='btn btn-primary btn-xs'><a href='/village.php?q=u&id=".$value['id']."' style='color:white;'><span class='glyphicon glyphicon-pencil'></span></a></button>";
        
	}

	echo json_encode($resultat);
?>

