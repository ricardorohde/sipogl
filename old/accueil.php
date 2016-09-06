<?php
    session_start();
    include_once 'include/class.user.php';
    $user = new User();
    
    
    $now = time(); // Checking the time now when home page starts.

	if ($now > $_SESSION['expire']) {
		$user->user_logout();
        header("location:login.php");
	}

    $uid = $_SESSION['uid'];

    if (!$user->get_session())
    {
       header("location:login.php");
    }

    if (isset($_GET['q']))
    {
        $user->user_logout();
        header("location:login.php");
    }
?>

<!--<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <title>Home</title>
		<style>
    		body{
    			font-family:Arial, Helvetica, sans-serif;
    		}
    		h1{
    		    font-family:'Georgia', Times New Roman, Times, serif;
    		}
		</style>
    </head>

    <body>
        <div id="container">
            <div id="header">
                <a href="home.php?q=logout">LOGOUT</a>
            </div>
            <div id="main-body">
    			<br/><br/><br/><br/>
    			<h1>
                  Hello <?php //$user->get_fullname($uid); ?>
    			</h1>	
            </div>
            <div id="footer"></div>
        </div>
    </body>
</html>-->

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
											<li class="small-icon icon-print"><a href="/home.php" >
												<i class="fa fa-print"></i>Gestion des groupes</a>
											</li>
											<li class="small-icon icon-print"><a href="/home.php" >
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


							<!--<div class="navbar-collapse collapse float-left">
								<ul class="nav navbar-nav">

									<li class="menu-item-custom">
										<a href="/faq-tutoriels/" title="Les tutoriels/tutoriaux/cours pour apprendre le PHP">
											Tutoriels
										</a>
									</li>
									<li class="menu-item-custom">
										<a href="/emplois-stages/" title="Découvrez toutes les offres d'emplois et de stages liées au PHP">
											Emplois &amp; Stages
										</a>
									</li>

									<li class="menu-item-custom">
										<a href="http://www.aperophp.net" title="ApéroPHP pour des apéros IRL sympas entre développeurs PHP">
											ApéroPHP
										</a>
									</li>

									<li class="menu-item-custom">
										<a href="http://www.openska.com/formations-php.php" title="Formation PHP">
											Formation PHP
										</a>
									</li>
									
								</ul>
							</div>-->
							
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


    
    
    <div class="panel" >
		<div class="panel-body" >
			<blockquote style="background:#00acee; color:#FFF; text-size:14px;">
				<h3 ><a href="#" style="color:#FFF;">Gouvernance politique et administrative exercee par les elus locaux et l'administration communale</a></h3>
			</blockquote>
		</div>
	</div>
		
    <div class="panel">
		<div class="panel-body"> 
		 <blockquote style="background:#ce1126; color:#FFF; text-size:14px;">
			<h3><a href="#" style="color:#FFF;">Gouvernance financiere exercee par l'administration communale</a></h3>
		</blockquote>
		</div>
	</div>
	
    <div class="panel">
		<div class="panel-body"> 
		<blockquote style="background:#fbb034; color:#FFF; text-size:14px;">
			<h3><a href="#" style="color:#FFF;">Gouvernance politique et administrative exercees par la Tutelle, la CAD et le CDCC</a></h3>
		</blockquote>
		</div>
	</div>
		
    <div class="panel">
		<div class="panel-body"> 
		 <blockquote style="background:#613854; color:#FFF; text-size:14px;">
		  <h3><a href="#" style="color:#FFF;">Gouvernance  economique et financiere exercee par l'Etat et ses Services</a></h3>
		</blockquote>
		</div>
	</div>
	
	
	
		
	
	
	<div class="clear"></div>

</div> <!-- /#page-body -->




<div id="page-footer">
</div><!-- /#page-footer -->





<!-- JQUERY : 
<script src="assets/js/jquery.min.js"></script>-->

<!-- BOOTSTRAP JS 
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>-->



<script src="adminbaba/js/jquery-1.11.1.min.js"></script>
	<script src="adminbaba/js/bootstrap.min.js"></script>
	<script src="adminbaba/js/chart.min.js"></script>
	<!--<script src="adminbaba/js/chart-data.js"></script>-->
	<!--<script src="adminbaba/js/easypiechart.js"></script>-->
	<!--<script src="adminbaba/js/easypiechart-data.js"></script>-->
	<!--<script src="adminbaba/js/bootstrap-datepicker.js"></script>-->
	<script src="adminbaba/js/bootstrap-table.js"></script>
	
	





</body>
</html>

