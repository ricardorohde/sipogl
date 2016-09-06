<?php
	session_start();
    include_once '../include/class.user.php';
    $user = new User();

    // Checking for user logged in or not
    if (!$user->is_loggedin())
    {
       //header("location:index.php");
       $user->redirect('index.php');
    }
    
	$getUsersQuery = "SELECT * FROM users ";
	$stmt = $this->conn->prepare($getUsersQuery);
	$stmt->execute();
	//$userRow=$stmt->fetchAll();
	$userRow=$stmt->fetchAll(PDO::FETCH_ASSOC);

	echo json_encode($userRow);
?>

