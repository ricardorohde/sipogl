<?php

	//require_once('dbconfig.php');
	include_once '../include/dbconfig.php';

	$getUsersQuery = "SELECT * FROM users ";
	$stmt = $this->conn->prepare($getUsersQuery);
	$stmt->execute();
	//$userRow=$stmt->fetchAll();
	$userRow=$stmt->fetchAll(PDO::FETCH_ASSOC);

	echo json_encode($userRow);
?>

