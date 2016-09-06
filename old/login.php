<?php
	session_start();
	include_once 'include/class.user.php';
	
	$user = new User();

	if (isset($_REQUEST['submit'])) 
	{ 
		
		extract($_REQUEST);  
		 
	    $login = $user->check_login($emailusername, $password);
	    
	    if ($login) 
	    {
	        // Registration Success
	       header("location:accueil.php");
	    } 
	    else 
	    {
	        // Registration Failed
	        echo 'Wrong username or password';
	    }
	}
?>


<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<div class="logo"></div>
<div class="login-block">
    <h1>SIPOGL</h1>
    <form action="" method="post" name="login">
    <input type="text" value="" name="emailusername" placeholder="Utilisateur" id="username" required />
    <input type="password" value="" name="password" placeholder="Mot de Passe" id="password" required />
    <input type="submit" name="submit" value="CONNEXION" >
    </form>
</div>

