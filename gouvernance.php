<?php
	ob_start();
    session_start();
    include_once 'include/class.user.php';
    include_once 'include/class.gouvernance.php';
    $user = new User();
    
    $gouvernance = new Gouvernance();
    
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

    if (isset($_GET['q']) AND $_GET['q']=='logout')
    {
        $user->is_loggedin();
        $user->redirect('login.php');
        //header("location:index.php");
    }
?>


<!DOCTYPE html>
<html dir="ltr" lang="fr"  xml:lang="fr">
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

	
	/* END: MTCP CSS */
</style>  <!-- END: CSS RULES -->


</head>



<body >

<!--<div id="wrap" class="">-->
<div id="wrap">
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
										
										<a href="#" title="Connexion" class="dropdown-toggle" data-toggle="dropdown" accesskey="x">
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
										
											<li class="small-icon icon-sendemail"><a href="/departement.php">
												<i class="fa fa-envelope"></i>Gestion des departements</a>
											</li>
											<li class="small-icon icon-print"><a href="/commune.php" >
												<i class="fa fa-print"></i>Gestion des communes</a>
											</li>
											<li class="small-icon icon-print"><a href="/arrondissement.php" >
												<i class="fa fa-print"></i>Gestion des arrondissements</a>
											</li>
											<li class="small-icon icon-print"><a href="/village.php" >
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



	
	  <?php
	  
		
		/*
		 * @id = id du gouvernance detail
		 * @g  = id du gouvernance
		 *
		 * * * * * * * * * * * * */
		if (isset($_GET['q']) AND $_GET['q']=='detail' AND isset($_GET['gouv']) AND !empty($_GET['gouv']) AND isset($_GET['gouvd']) AND !empty($_GET['gouvd']))
		{
			$gouv_id = $_GET['gouv'];
			$gouv_d_id = $_GET['gouvd'];
			//$allGouvDetail = $gouvernance->getAllGouvernanceDetailsById($gouv_id,$id);
			$allGouvDetailDescription = $gouvernance->getAllGouvernanceDetailsDescription($gouv_d_id);
			
			if($_GET['gouvd'] == 1)
			{
				
				
			}
				
			
			if(count($allGouvDetailDescription)> 0)
			{
				
			
				echo'				
						
						<div class="panel-body">
							<h3  style="font-size:18px; border-bottom:1px solid; padding-bottom:10px;">'.utf8_encode($allGouvDetailDescription[0]['gouv_details_name']).'</h3>
						</div>
						
					';
					
				echo'
				<div class="btn btn-default navbar-btn">
							<a href="/accueil.php?q=detail&id='.$gouv_d_id.'" ><span class="glyphicon glyphicon-log-in" aria-hidden="true" ></span> &nbsp; Retour</a>
						</div>
						<ul class="list-group">';
							foreach($allGouvDetailDescription as $key => $value)
							{
								
								if($key == 0)
								{
									echo'<li class="list-group-item">'.utf8_encode($value['name']).'</li>';
									echo'<li class="list-group-item list-group-item-info"><span class="badge">14</span>Cras sit amet nibh libero</li>';
								}
								else
								{
									echo'<li class="list-group-item"><span class="badge">14</span>'.utf8_encode($value['name']).'</li>';
								}
							}
							
						echo'</ul>
				
				
				';
				
				
			}
			else
			{
				
				echo'
					<ul class="list-group">
						<li class="list-group-item">Aucune information disponible. Veuillez contacter l\'administrateur</li>
					</ul>
					';
			}
			  	
		}
		
	
	?>
	

	

	
	
		<div class="clear"></div>

	</div> <!-- /#page-body -->
</div> <!-- /#wrap -->




<div id="page-footer">&copy; Aout 2016</div><!-- /#page-footer -->






<script src="adminbaba/js/jquery-1.11.1.min.js"></script>
<script src="adminbaba/js/bootstrap.min.js"></script>
<script src="adminbaba/js/chart.min.js"></script>

<script src="adminbaba/js/bootstrap-table.js"></script>
	
	





</body>
</html>

<? ob_end_flush(); ?>
