<?php
    session_start();
    require_once 'include/class.user.php';
    $user = new User();

    if(!$user->is_loggedin())
	{
		$user->redirect('login.php');
	}
    

    if (isset($_GET['q']) AND $_GET['q']=='logout')
    {
        $user->doLogout();
        
		if(isset($_SERVER['HTTP_REFERER'])) 
		{
			$user->redirect($_SERVER['HTTP_REFERER']); 
		} 
		else 
		{ 
			$user->redirect('index.php');
		}
		exit;  
        
        
        
    }
?>
