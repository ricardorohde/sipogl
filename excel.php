<?php
	ob_start();
    session_start();
    
    //set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');
	include 'PHPExcel/Classes/PHPExcel/IOFactory.php';
    
    include_once 'include/class.user.php';
    $user = new User();
    
    $now = time(); // Checking the time now when home page starts.

	if ($now > $_SESSION['expire']) 
	{
		$user->doLogout();
		$user->redirect('login.php');
 
	}

    $uid = $_SESSION['uid'];

    if (!$user->is_loggedin())
    {

       $user->redirect('login.php');
    }

    if (isset($_GET['q']))
    {
        $user->is_loggedin();
        $user->redirect('login.php');

    }
    
    
    
    if (isset($_POST['importer']) AND $_POST['importer']=='Importer')
    {
		
        
        //echo '<pre>'; 
			//print_r($_FILES);
		//echo'</pre>';
        
        $file = $_FILES['file']['tmp_name'];
        
        //$fileName = $_FILES['file']['name'];
        
        if($_FILES['file']['size']!= 0)
        {
			
			try 
			{
				$objPHPExcel = PHPExcel_IOFactory::load($file);
			} 
			catch(Exception $e) 
			{
				die('Error loading file "'.pathinfo($file,PATHINFO_BASENAME).'": '.$e->getMessage());
			}
			
			//$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
			//$arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet
			
			$sheetCount = $objPHPExcel->getSheetCount(); //Count sheets
			
				
			$j = 0;
			while ($objPHPExcel->setActiveSheetIndex($j))
			{

				
				if($j >= $objPHPExcel->getSheetCount()-1)
				{
					break;
				}
				else
				{
					$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
					$arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet
					
					echo '<pre>'; 
						//print_r($allDataInSheet);
					echo'</pre>';
					
					$objWorksheet = $objPHPExcel->getActiveSheet();
					//now do whatever you want with the active sheet
					
					for($i = 7; $i <= $arrayCount; $i++)
					{
						//La liste des Conseillers communaux ou municipaux
						
						$genre = trim($allDataInSheet[$i]["A"]);
						$residence = trim($allDataInSheet[$i]["B"]);
						$contact = trim($allDataInSheet[$i]["C"]);
						$fonction = trim($allDataInSheet[$i]["D"]);
						$debut_mandat = trim($allDataInSheet[$i]["E"]);
						$fin_mandat = trim($allDataInSheet[$i]["F"]);
						
							// Insertion in Commune
							
							
						//La liste des Conseillers d'arrondissement
						
						$genre = trim($allDataInSheet[$i]["H"]);
						$residence = trim($allDataInSheet[$i]["I"]);
						$contact = trim($allDataInSheet[$i]["J"]);
						$fonction = trim($allDataInSheet[$i]["K"]);
						$debut_mandat = trim($allDataInSheet[$i]["L"]);
						$fin_mandat = trim($allDataInSheet[$i]["M"]);
						
							// Insertion in Arrondissement
							
							
						//La liste des Conseillers de villages ou quartiers de ville
						
						$genre = trim($allDataInSheet[$i]["O"]);
						$residence = trim($allDataInSheet[$i]["P"]);
						$contact = trim($allDataInSheet[$i]["Q"]);
						$fonction = trim($allDataInSheet[$i]["R"]);
						$debut_mandat = trim($allDataInSheet[$i]["S"]);
						$fin_mandat = trim($allDataInSheet[$i]["T"]);
						
						// Insertion in villages
						
						

					}	
					
					$j++;
										
				}
				
				
				
			}
        }
        else
        {
			$user->redirect('echec.php?q=excel');
		}
        
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
							
							<div class="navbar-collapse collapse float-left">
								<ul class="nav navbar-nav">
									<li class="dropdown login-box-toggle">
										
										<a href="/home.php" title="Connexion" class="dropdown-toggle" data-toggle="dropdown" accesskey="x">
											<i class="icon fa fa-power-off"></i> <span class="inner-text">Excel</span><span class="caret"></span>
										</a>
					
										<ul class="dropdown-menu">
										
											<li class="small-icon icon-sendemail"><a href="/excel.php">
												<i class="fa fa-envelope"></i>Importer</a>
											</li>
											<!--<li class="small-icon icon-print"><a href="/excel.php" >
												<i class="fa fa-print"></i>Gestion des communes</a>
											</li>
											<li class="small-icon icon-print"><a href="/excel.php" >
												<i class="fa fa-print"></i>Gestion des arrondissements</a>
											</li>
											<li class="small-icon icon-print"><a href="/excel.php" >
												<i class="fa fa-print"></i>Gestion des villages</a>
											</li>-->
											
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



	
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Importer un fichier excel</h3>
			</div>
			<div class="panel-body">
				
				<form name="import" method="post" enctype="multipart/form-data">
					
					<div class="form-group">
						<label>Ajouter Fichier Excel</label>					
						<input type="file" name="file" class="form-control"/>
					</div>
					<input type="submit" name="importer" class="btn btn-default" value="Importer" />
				</form>	
				
			</div>
		</div>
	
	
	

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
