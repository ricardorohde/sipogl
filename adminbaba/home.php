<?php
    session_start();
    include_once '../include/class.user.php';
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
			<div class="header-content container">
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
									<a href="/home" class="dropdown-toggle" data-toggle="dropdown" style="height:60px; text-transform:none;">            
										Accueil
									</a>
									

								</li>
							</ul>


							<div class="navbar-collapse collapse float-left">
								<ul class="nav navbar-nav">

									<li class="menu-item-custom">
										<a href="/faq-tutoriels/" title="Les tutoriels/tutoriaux/cours pour apprendre le PHP">
											<!--<i class="icon fa fa-book"></i>-->Tutoriels
										</a>
									</li>
									<li class="menu-item-custom">
										<a href="/emplois-stages/" title="Découvrez toutes les offres d'emplois et de stages liées au PHP">
											<!--<i class="icon fa fa-rocket"></i>-->Emplois &amp; Stages
										</a>
									</li>

									<li class="menu-item-custom">
										<a href="http://www.aperophp.net" title="ApéroPHP pour des apéros IRL sympas entre développeurs PHP">
											<!--<i class="icon fa fa-glass"></i>-->ApéroPHP
										</a>
									</li>

									<li class="menu-item-custom">
										<a href="http://www.openska.com/formations-php.php" title="Formation PHP">
											<!--<i class="icon fa fa-graduation-cap"></i>-->Formation PHP
										</a>
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
				
									<div class="dropdown-menu" >

										<!-- LOGIN-BOX -->

										<div class="login-box">
											<form action="/home.php" method="post" id="login">
												<fieldset>
													<dl>
														<dt></dt>
														<dd class="text-center">
															<input type="text" tabindex="1" name="username" id="box_username" size="25" placeholder="Nom d'utilisateur" class="inputbox autowidth add-border" title="Nom d'utilisateur" />
														</dd>
													</dl>

													<dl>
														<dt></dt>
														<dd class="text-center">
															<input type="password" tabindex="2" name="password" id="box_password" size="25" placeholder="Mot de passe" class="inputbox autowidth add-border" title="Mot de passe" />
														</dd>
													</dl>

													<dl>
														<dt></dt>
														<dd class="float-left"><a href="">J'ai oublié mon mot de passe</a></dd>
														<dd class="text-left float-right"><label for="viewonline">
															<input type="checkbox" name="viewonline" id="viewonline" tabindex="5" /> Invisible</label>
														</dd>
													</dl>

													<input type="hidden" name="redirect" value="./viewtopic.php/sql-bases-donnees/erreur-sql-too-many-connections-t248778.html?forum_uri=sql-bases-donnees&amp;start=&amp;t=248778&amp;sid=9fce4a3cc13ba25ce881611432720b8c" />


													<dl>
														<dt></dt>
														<dd class="button-container">
															<label for="autologin" class="float-right"><input type="checkbox" name="autologin" id="autologin" tabindex="4" /> Se souvenir de moi</label>
															<input type="submit" name="login" tabindex="6" value="Connexion" class="button1 float-left" />
															<a href="home.php?q=logout">LOGOUT</a>
														</dd>
													</dl>
												</fieldset>
											</form>
										</div><!-- /.login-box -->
									</div>
								</li>
					 

								<!--<li>
									<div id="navbar-searchbox-container" class="" role="search" style="width: auto;">
										<div id="navbar-searchbox">
											<form action="http://forum.phpfrance.com/search.php" method="get" id="search">
												<fieldset>
													<input name="keywords" id="keywords" type="text" title="Rechercher par mots-clés" class="search anim-250" value="" />
													<input class="search-icon anim-250" value="&#xf002;" title="Rechercher" type="submit" /> <input type="hidden" name="sid" value="9fce4a3cc13ba25ce881611432720b8c" />
												</fieldset>
											</form>
										</div>
										<i class="icon fa fa-search"></i>
									</div>
								</li>-->
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


		<div class="action-bar bottom topic-actions view-topic  ">

			<div class="float-left">
				<div class="buttons">
				<a href="/home.php" class="button1 icon-button reply-icon" title="Publier une réponse">
					<!--<i class="fa fa-reply"></i>-->
					&nbsp;&nbsp;Répondre
				</a>
			</div>

			<!--<div class="forum-info-text">
				23 messages
				<ul>
					<li class="active padding-h-5px"><span>1</span></li>
					<li class="padding-h-5px"><a href="http://forum.phpfrance.com/sql-bases-donnees/erreur-sql-too-many-connections-t248778-15.html?sid=9fce4a3cc13ba25ce881611432720b8c" role="button">2</a></li>
					<li class="next padding-h-5px"><a href="http://forum.phpfrance.com/sql-bases-donnees/erreur-sql-too-many-connections-t248778-15.html?sid=9fce4a3cc13ba25ce881611432720b8c" rel="next" role="button">Suivant</a></li>
				</ul>
			</div>-->
			
		</div><!-- /.float-left --> 


		<div class="float-right">
			<div class="dropdown topic-tools">
				<a href="#" class="dropdown-toggle icon-button button1" data-toggle="dropdown" title="Outils du sujet">
					<i class="fa fa-cog"></i>&nbsp;&nbsp; Outils du sujet
					<span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
					<li class="small-icon icon-sendemail"><a href="/home.php" title="Envoyer par courrier électronique le sujet">
						<i class="fa fa-envelope"></i>&nbsp;&nbsp; Envoyer par courrier électronique le sujet</a></li>
					<li class="small-icon icon-print"><a href="/home.php" title="Aperçu avant impression" accesskey="p">
						<i class="fa fa-print"></i>&nbsp;&nbsp; Aperçu avant impression</a></li>
				</ul>
			</div><!-- /.topic-tools -->
		</div><!-- /.float-right -->
	</div>

	<div class="clear"></div>



	<div class="navbar beadcrumb">
		On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L'avantage du Lorem Ipsum sur un texte générique comme 'Du texte. Du texte. Du texte.' est qu'il possède une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du français standard. De nombreuses suites logicielles de mise en page ou éditeurs de sites Web ont fait du Lorem Ipsum leur faux texte par défaut, et une recherche pour 'Lorem Ipsum' vous conduira vers de nombreux sites qui n'en sont encore qu'à leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d'y rajouter de petits clins d'oeil, voire des phrases embarassantes).
	</div><!-- /.navbar.beadcrumb -->
	
	<div class="clear"></div>

</div> <!-- /#page-body -->




<div id="page-footer">
</div><!-- /#page-footer -->





<!-- JQUERY : -->
<script src="assets/js/jquery.min.js"></script>

<!-- BOOTSTRAP JS -->
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>







</body>
</html>

