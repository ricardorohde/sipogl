<?php

    session_start();
    include_once 'include/class.user.php';
    $user = new User();
    
    $now = time(); // Checking the time now when home page starts.

	if ($now > $_SESSION['expire']) 
	{
		$user->doLogout();
		$user->redirect('login.php');
        //header("location:login.php");
	}

    $uid = $_SESSION['uid'];

    if (!$user->is_loggedin())
    {
       //header("location:login.php");
       $user->redirect('login.php');
    }

    if (isset($_GET['q']))
    {
        $user->is_loggedin();
        $user->redirect('login.php');
        //header("location:index.php");
    }
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width" />
<meta name="robots" content="index, follow" />
<meta name="author" content="@rthur" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>@Home </title>

<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="assets/css/content.css">
<link rel="stylesheet" type="text/css" href="assets/css/common.css">
<link rel="stylesheet" type="text/css" href="assets/css/links.css">
<link rel="stylesheet" type="text/css" href="assets/css/mobbern.css">
<link rel="stylesheet" type="text/css" href="assets/css/color-theme.css">
<link rel="stylesheet" type="text/css" href="assets/css/mobbern-responsive.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">


<link href="adminbaba/css/datepicker3.css" rel="stylesheet">
<link href="adminbaba/css/bootstrap-table.css" rel="stylesheet">



<!-- CSS RULES: -->
<style type="text/css">
	/* MTCP CSS */

	/* Custom background-color: */
	body, #scroll-top { background-color: #EEE !important; }
	/* Body Font Size: */
	body { font-size: 14px !important; } /*13px*/

	/* END: MTCP CSS */
</style>  <!-- END: CSS RULES -->


</head>



<body >

<!--<div id="wrap" class="">-->
	<div id="page-header">
		<header class="header-body" id="mobbern-header-3">


			<!-- Header -->
			<div class="header-content container maincontent">
				<div class="row">
					<div class="col-md-4">
						<h1 class="anim-150-container" style='line-height: 70px;'>
							<a id="logo-big" href="/home.php" title="Accueil du forum">
								<img src="assets/img/logo.png" alt="PHPfrance" style="max-width:256px; margin-top:-20px;" />
							</a>
						</h1>
					</div>
				</div>
			</div>


			<!-- Header Navbar -->
			<nav id="main-navbar" class="navbar navbar-default navbar-static-top">
				<div class="container">
					<div class="nav-content">
						<div class="float-left">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>

							<ul class="nav float-left">
								<li class="active dropdown">
									<a href="/accueil.php" class="dropdown-toggle" style="height:60px; text-transform:none;">            
										Accueil
									</a>
									

								</li>
							</ul>
							
							<div class="navbar-collapse collapse float-left">
								<ul class="nav navbar-nav">
									<li class="dropdown login-box-toggle">
										
										<a href="/home.php" title="Connexion" class="dropdown-toggle" data-toggle="dropdown" accesskey="x">
											<i class="icon fa fa-power-off"></i> <span class="inner-text">ACL</span><span class="caret"></span>
										</a>
					
										<ul class="dropdown-menu">
											<li class="small-icon icon-print"><a href="/utilisateur.php" >
												<i class="fa fa-print"></i>Gestion des utilisateurs</a>
											</li>
											<li class="small-icon icon-print"><a href="/role.php" >
												<i class="fa fa-print"></i>Gestion des groupes</a>
											</li>
											<li class="small-icon icon-print"><a href="/permission.php" >
												<i class="fa fa-print"></i>Gestion des permissions</a>
											</li>
											
											
										</ul>
									</li>
									
									
								</ul>
							</div>
							
							
							<div class="navbar-collapse collapse float-left">
								<ul class="nav navbar-nav">
									<li class="dropdown login-box-toggle">
										
										<a href="/home.php" title="Connexion" class="dropdown-toggle" data-toggle="dropdown" accesskey="x">
											<i class="icon fa fa-power-off"></i> <span class="inner-text">Parametres</span><span class="caret"></span>
										</a>
					
										<ul class="dropdown-menu">
										
											<li class="small-icon icon-sendemail"><a href="/home.php">
												<i class="fa fa-envelope"></i>Gestion des departements</a>
											</li>
											<li class="small-icon icon-print"><a href="/home.php" >
												<i class="fa fa-print"></i>Gestion des communes</a>
											</li>
											<li class="small-icon icon-print"><a href="/home.php" >
												<i class="fa fa-print"></i>Gestion des arrondissements</a>
											</li>
											<li class="small-icon icon-print"><a href="/home.php" >
												<i class="fa fa-print"></i>Gestion des villages</a>
											</li>
											
										</ul>
									</li>
									
									
								</ul>
							</div>
							
						</div><!-- /.float-left -->


						<div class="float-right">
							<ul class="nav navbar-nav">
								<li class="dropdown login-box-toggle">
									
									<a href="/home.php" title="Connexion" class="dropdown-toggle" data-toggle="dropdown" accesskey="x">
										<i class="icon fa fa-power-off"></i> <span class="inner-text">Connexion</span><span class="caret"></span>
									</a>
				
									<ul class="dropdown-menu">
										<li class="small-icon icon-sendemail"><a href="/home.php">
											<i class="fa fa-envelope"></i>Mon profil</a></li>
										<li class="small-icon icon-print"><a href="/home.php" >
											<i class="fa fa-print"></i>Modifier mon Mot de Passe</a></li>
									</ul>
								</li>
								<li>
									<nav aria-label="" style="margin-left:80px; margin-top:-6px;">
										<ul class="pager">
											<li><a href="home.php?q=logout">Deconnexion</a></li>
										</ul>
										<br>
									</nav>
								</li>
					
							</ul>			      
						</div><!-- /.float-right -->
					</div><!-- /.nav-content -->
				</div><!-- /.container -->
			</nav><!-- /#main-navbar -->
			<div class="float-clear"></div>
		</header><!-- /#mobbern-header-2 -->
	</div><!-- /#page-header -->


	<div id="page-body" class="page-width container ">
		<div class="action-bar top topic-actions view-topic">

			<div class="float-left">
				<div class="buttons">
					<script src="/home.php"></script>
				</div>
			</div><!-- /.float-left -->
			
			<div class="float-right"></div><!-- /.float-right -->
			
		</div><!-- /.topic-actions -->

		<div class="clear"></div>

		<div class="posts-wrapper"></div><!-- /.posts-wrapper -->


		<div class="action-bar bottom topic-actions view-topic  "></div>

	<div class="clear"></div>


	
	<div class="list-group">
	  <a class="list-group-item " style="background:#1ABC9C ; color:#FFF; text-size:14px; font-weight: bold;">
		<h2 >Gouvernance politique et administrative exercee par les elus locaux et l'administration communale</h2>
	  </a>
	  <a href="/agouvernance.php" class="list-group-item" style="color:#121212;">Informations personnelles sur les elus locaux</a>
	  <a href="/agouvernance.php" class="list-group-item" style="color:#121212;">Efficacité du conseil communal dans l'organisation des sessions du conseil</a>
	  <a href="/agouvernance.php" class="list-group-item" style="color:#121212;">Efficience du conseil communal dans l'organisation des sessions du conseil</a>
	  <a href="/agouvernance.php" class="list-group-item" style="color:#121212;">Efficacité du conseil communal dans la mise en place des commissions permanentes </a>
	  <a href="/agouvernance.php" class="list-group-item" style="color:#121212;">Performance du conseil communal dans la mise en place des commissions  </a>
	  <a href="/agouvernance.php" class="list-group-item" style="color:#121212;">Fonctionnalité des organes infra communaux  </a>
	  <a href="/agouvernance.php" class="list-group-item" style="color:#121212;">Niveau d'implication des populations dans la gestion du développement local  </a>
	  <a href="/agouvernance.php" class="list-group-item" style="color:#121212;">Efficacité de l'administration communale dans la mise en place des services de l'administration communale  </a>
	  <a href="/agouvernance.php" class="list-group-item" style="color:#121212;">Efficacité de l'administration communale dans la mise en place des outils de gestion  </a>
	  <a href="/agouvernance.php" class="list-group-item" style="color:#121212;">Performance dans la production des rapports d'activités  </a>
	  <a href="/agouvernance.php" class="list-group-item" style="color:#121212;">Performance de l'administration communale dans l'organisation des réunions de suivi-coordination  </a>
	  <a href="/agouvernance.php" class="list-group-item" style="color:#121212;">Performance de l'administration communale dans l'utilisation des ressources humaines disponibles  </a>
	  <a href="/agouvernance.php" class="list-group-item" style="color:#121212;">Performance de l'administration communale dans l'offre des services (prestations) aux citoyens  </a>
	  <a href="/agouvernance.php" class="list-group-item" style="color:#121212;">Efficacité dans l'information/communication aux citoyens  </a>
	  <a href="/agouvernance.php" class="list-group-item" style="color:#121212;">Niveau de transparence dans la gestion des marchés publics par l'administration communale  </a>
	  <a href="/agouvernance.php" class="list-group-item" style="color:#121212;">Niveau d'implication des organisations de femmes dans la gestion de la commune  </a>
	  <a href="/agouvernance.php" class="list-group-item" style="color:#121212;">Niveau d'implication de la commune dans la promotion de l'intercommunalité  </a>

	  
	</div>
	
	
	
		
	
	
	<div class="clear"></div>

</div> <!-- /#page-body -->




<div id="page-footer">
</div><!-- /#page-footer -->






<script src="adminbaba/js/jquery-1.11.1.min.js"></script>
<script src="adminbaba/js/bootstrap.min.js"></script>
<script src="adminbaba/js/chart.min.js"></script>

<script src="adminbaba/js/bootstrap-table.js"></script>
	
	





</body>
</html>

