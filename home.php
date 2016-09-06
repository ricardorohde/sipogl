<?php
    session_start();
    require_once 'include/class.user.php';
    $u = new User();
    
    
    $now = time(); // Checking the time now when home page starts.

	if ($now > $_SESSION['expire']) {
		$u->doLogout();
        header("location:login.php");
	}

    $uid = $_SESSION['uid'];

    if (!$u->is_loggedin())
    {
       header("location:login.php");
    }

    if (isset($_GET['q']))
    {
        $u->doLogout();
        header("location:login.php");
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
								<!--<img src="assets/img/logo.png" alt="PHPfrance" style="max-width:256px; margin-top:-20px;" />-->
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
								<li>
									<nav aria-label="" style="margin-left:80px; margin-top:-6px;">
										<ul class="pager">
											<li><a href="home.php?q=logout">Deconnexion</a></li>
										</ul>
										<br>
									</nav>
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
				
				<div class="btn btn-default navbar-btn">
					<a href="/home.php"> count &nbsp;&nbsp;<span class="badge">4</span></a>
				</div>
				
				<div class="btn btn-default navbar-btn">
					<a href="/home.php" class="">Ajouter</a>
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
			
			<div class="btn btn-default navbar-btn">
				<a href="/home.php" >Retour</a>
			</div>
			
			
			
			
			
			
			
			<!--<div class="dropdown topic-tools">
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
			</div>--><!-- /.topic-tools -->
			
		</div><!-- /.float-right -->
	</div>

	<div class="clear"></div>



	<!--<div class="navbar beadcrumb">
		On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L'avantage du Lorem Ipsum sur un texte générique comme 'Du texte. Du texte. Du texte.' est qu'il possède une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du français standard. De nombreuses suites logicielles de mise en page ou éditeurs de sites Web ont fait du Lorem Ipsum leur faux texte par défaut, et une recherche pour 'Lorem Ipsum' vous conduira vers de nombreux sites qui n'en sont encore qu'à leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d'y rajouter de petits clins d'oeil, voire des phrases embarassantes).
	</div><!-- /.navbar.beadcrumb -->
	
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><h3 style="color:white;">Advanced</h3> </div>
					<div class="panel-body">
						<table class="table table-bordred table-striped" data-toggle="table" data-url="adminbaba/tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="asc">
						    <thead>
						    <tr>
						        <!--<th data-field="state" data-checkbox="true" >Item ID</th>-->
						        <th data-field="id"     data-sortable="true">Item ID</th>
						        <th data-field="name"   data-sortable="true">Item Name</th>
						        <th data-field="price"  data-sortable="true">Item Price</th>
						        <th data-field="update" data-align="center" >Modifier</th>
						        <th data-field="delete" data-align="center" >Supprimer</th>
						    </tr>
						    </thead>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
		
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><h3 style="color:white;">AJOUTER</h3> </div>
					<div class="panel-body">
						<div class="col-md-6 col-md-6-form" style="margin-left:10%;">
							<form role="form">
							
								<div class="form-group">
									<label>Text Input</label>
									<input class="form-control" placeholder="Placeholder">
								</div>
																
								<div class="form-group">
									<label>Password</label>
									<input type="password" class="form-control">
								</div>
								
								<div class="form-group checkbox">
								  <label>
								    <input type="checkbox">Remember me</label>
								</div>
																
								<div class="form-group">
									<label>File input</label>
									<input type="file">
									 <p class="help-block">Example block-level help text here.</p>
								</div>
								
								<div class="form-group">
									<label>Text area</label>
									<textarea class="form-control" rows="3"></textarea>
								</div>
								
								<label>Validation</label>
								<div class="form-group has-success">
									<input class="form-control" placeholder="Success">
								</div>
								<div class="form-group has-warning">
									<input class="form-control" placeholder="Warning">
								</div>
								<div class="form-group has-error">
									<input class="form-control" placeholder="Error">
								</div>
								
							</div>
							<!--<div class="col-md-6">
							
								<div class="form-group">
									<label>Checkboxes</label>
									<div class="checkbox">
										<label>
											<input type="checkbox" value="">Checkbox 1
										</label>
									</div>
									<div class="checkbox">
										<label>
											<input type="checkbox" value="">Checkbox 2
										</label>
									</div>
									<div class="checkbox">
										<label>
											<input type="checkbox" value="">Checkbox 3
										</label>
									</div>
									<div class="checkbox">
										<label>
											<input type="checkbox" value="">Checkbox 4
										</label>
									</div>
								</div>
								
								<div class="form-group">
									<label>Radio Buttons</label>
									<div class="radio">
										<label>
											<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>Radio Button 1
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Radio Button 2
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">Radio Button 3
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">Radio Button 4
										</label>
									</div>
								</div>
								
								<div class="form-group">
									<label>Selects</label>
									<select class="form-control">
										<option>Option 1</option>
										<option>Option 2</option>
										<option>Option 3</option>
										<option>Option 4</option>
									</select>
								</div>
								
								<div class="form-group">
									<label>Multiple Selects</label>
									<select multiple class="form-control">
										<option>Option 1</option>
										<option>Option 2</option>
										<option>Option 3</option>
										<option>Option 4</option>
									</select>
								</div>
								
								<button type="submit" class="btn btn-primary">Submit Button</button>
								<button type="reset" class="btn btn-default">Reset Button</button>
							</div>-->
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		
		
		
		<div class="row">
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<!--<h4>New Orders</h4-->
						<div class="easypiechart" id="easypiechart-blue" data-percent="92" ><span class="percent">Gouvernance politique et administrative exercée par les élus locaux et l'administration communale</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<div class="easypiechart" id="easypiechart-orange" data-percent="65" ><span class="percent">Gouvernance financière exercée par l'administration communale</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<div class="easypiechart" id="easypiechart-teal" data-percent="56" ><span class="percent">Gouvernance politique et administrative exercées par la Tutelle, la CAD et le CDCC</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<div class="easypiechart" id="easypiechart-red" data-percent="27" ><span class="percent">Gouvernance  économique et financière exercée par l'Etat et ses Services</span>
						</div>
					</div>
				</div>
			</div>

		</div><!--/.row-->
		
		
		<div class="col-md-6">
                                    <div class="panel box-v1">
                                      <div class="panel-heading bg-white border-none">
                                        <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                                          <h4 class="text-left">Visit</h4>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                                           <h4>
                                           <span class="icon-user icons icon text-right"></span>
                                           </h4>
                                        </div>
                                      </div>
                                      <div class="panel-body text-center">
                                        <h1>51181,320</h1>
                                        <p>User active</p>
                                        <hr/>
                                      </div>
                                    </div>
                                </div>
		<div class="col-md-6">
                                    <div class="panel box-v1">
                                      <div class="panel-heading bg-white border-none">
                                        <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                                          <h4 class="text-left">Visit</h4>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                                           <h4>
                                           <span class="icon-user icons icon text-right"></span>
                                           </h4>
                                        </div>
                                      </div>
                                      <div class="panel-body text-center">
                                        <h1>51181,320</h1>
                                        <p>User active</p>
                                        <hr/>
                                      </div>
                                    </div>
                                </div>
		<div class="col-md-6">
                                    <div class="panel box-v1">
                                      <div class="panel-heading bg-white border-none">
                                        <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                                          <h4 class="text-left">Visit</h4>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                                           <h4>
                                           <span class="icon-user icons icon text-right"></span>
                                           </h4>
                                        </div>
                                      </div>
                                      <div class="panel-body text-center">
                                        <h1>51181,320</h1>
                                        <p>User active</p>
                                        <hr/>
                                      </div>
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

