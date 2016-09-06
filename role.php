<?php
	ob_start();
	session_start();
    include_once 'include/class.role.php';
    include_once 'include/class.user.php';
    $user = new User();
    
    $Role = new Role();
    
    // Checking for user logged in or not
    if (!$Role->is_loggedin())
    {
       $Role->redirect('index.php');
    }
    
    if (isset($_REQUEST['save']))
    {

        extract($_REQUEST);
        
        $datecreation = date("Y-m-d H:i:s");
        
        if ($Role->doInsertRole($nom, $datecreation, $status, serialize($permission))) 
        {
            $user->redirect('succes.php?q=role');
        
        } 
        else 
        {
            
            $user->redirect('echec.php?q=role');
            
        }
        
        
        /*if(!empty($nom) AND !empty($status))
        {
   
			$monRole = $Role->doInsertRole($nom, $datecreation, $status, serialize($permission));
			
			
			if($monRole) 
			{
				echo 'Registration  successful <a href="login.php">Click here</a> to login';
			} 
			else 
			{
				echo 'Registration failed. Email or Username already exits please try again';
			}
			
        }
        else 
		{
			echo 'Registration failed. Email or Username already exits please try again';
		}
		* */
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

<div id="wrap" class="">
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
										
										<a href="#" title="Connexion" class="dropdown-toggle" data-toggle="dropdown" accesskey="x">
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
									
									<a href="#" title="Connexion" class="dropdown-toggle" data-toggle="dropdown" accesskey="x">
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


			
		
		
		
		<?php
		
			
			
			
			if (isset($_GET['q']) && $_GET['q']=='u')
			{
				$updateId = $_GET['id'];
				$myRolesIs = $Role->getRolePerms($updateId);
				//print_r($myRolesIs);
				if(count($myRolesIs) > 0)
				{
					
					$thePermissions = $Role->getAllPermission();
					
					if (isset($_REQUEST['modifier']) AND isset($_GET['q']) && $_GET['q']=='u')
					{
						extract($_REQUEST);
						
						if(!empty($nom) AND $status != "" AND count($permission) !=0)
						{
							
							
							if ($Role->doUpdateRoleById($nom, $status, $updateId, serialize($permission))) 
							{
								$user->redirect('succes.php?q=role');							
							} 
							else 
							{								
								$user->redirect('echec.php?q=role');								
							}
												
						}
						
					}
					
					
					
					echo'
				
						<div class="action-bar bottom topic-actions view-topic  ">

								<div class="float-left">
									
									<div class="btn btn-default navbar-btn">
										<a href=""> Total : &nbsp;&nbsp;<span class="badge">4</span></a>
									</div>
									
									<!--<div class="btn btn-default navbar-btn">
										<a href="/role.php?q=add" class="">Ajouter</a>
									</div>-->

								</div><!-- /.float-left --> 


								<div class="float-right">
								
									<div class="btn btn-default navbar-btn">
										<a href="/role.php" >Retour a la liste</a>
									</div>
			
								</div><!-- /.float-right -->
							</div>
						
						<div class="row">
							<div class="col-lg-12">
								<div class="panel panel-default">
									<div class="panel-heading"><h3 style="color:white;">Ajouter un nouveau role</h3> </div>
									<div class="panel-body">
										<div class="col-md-6 col-md-6-form" style="margin-left:10%;">
											<form role="form" method="post" action="">
											
												<div class="form-group">
													<label>Nom Role</label>
													<input type="text" name="nom" class="form-control" value="'.$myRolesIs['name'].'">
												</div>
												
												
												
												<div class="form-group">
													<label>Status</label>
													<select class="form-control" name="status">
														<option value="1">Actif</option>
														<option value="0">Inactif</option>
													</select>
												</div>
												
												
												<div class="panel panel-default">
													<!-- Default panel contents -->
													<div class="panel-heading-gray"><h3>Permissions</h3></div>
													<!-- List group -->
													<ul class="list-group">';
													
														foreach ($thePermissions as $key => $value)
														{

															echo '<li class="list-group-item"><input type="checkbox" id="checkbox-fa-light-1" value="'.$value['name'].'" name="permission[]"> &nbsp;&nbsp;&nbsp; '.$value['name'].'</li>';
																
														}
														
													echo'</ul>
												</div>
												
												
												
												<input type="submit" name="modifier" class="btn btn-default" value="Enregistrer" />
											</div>
											
										</form>
									</div>
								</div>
							</div><!-- /.col-->
						</div><!-- /.row -->';
					
				}else
				{
					echo "Erreur";
				}
				
				
			}	
			elseif (isset($_GET['q']) && $_GET['q']=='d')
			{
				$delBool = false;
				
				$deleteId = $_GET['id'];
				
				$myUserIs = $Role->getUserById($deleteId);
				
				if (isset($_REQUEST['supprimer']) AND isset($_GET['q']) && $_GET['q']=='d')
				{
					extract($_REQUEST);
					
					$status = (isSet($myUserIs['status']) AND  $myUserIs['status'] == 0)? 1 : 0;
					
					$delete = $Role->doDeleteUserById($status, $deleteId);
					
					if($delete)
					{
						$delBool = true;
					}
					
				}
				
				if($delBool)
				{
					echo'<center><div class="btn btn-default navbar-btn"><a href="/role.php" >Retour a la liste</a></div></center>';
				}
				else
				{
					echo '
					
						<div class="alert bg-warning" role="alert">
							 Confirmer cette op&eacute;ration ? ('.$myUserIs['fullname'].' ) 
						</div>
						<center>
						<form role="form" method="post" action="">
							
							<div class="btn btn-default navbar-btn"><a href="/role.php" >Annuler</a></div>
							<input type="submit" name="supprimer" class="btn btn-default" value="Supprimer" />
							
						</form>
						</center>
					';
				}
				
			}
			elseif (isset($_GET['q']) && $_GET['q']=='add')
			{
				
				$thePermissions = $Role->getAllPermission();
				
				//print_r($thePermissions);
				
				echo'
				
					<div class="action-bar bottom topic-actions view-topic  ">

							<div class="float-left">
								
								<div class="btn btn-default navbar-btn">
									<a href=""> Total : &nbsp;&nbsp;<span class="badge">4</span></a>
								</div>
								
								<!--<div class="btn btn-default navbar-btn">
									<a href="/role.php?q=add" class="">Ajouter</a>
								</div>-->

							</div><!-- /.float-left --> 


							<div class="float-right">
							
								<div class="btn btn-default navbar-btn">
									<a href="/role.php" >Retour a la liste</a>
								</div>
		
							</div><!-- /.float-right -->
						</div>
					
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-heading"><h3 style="color:white;">Ajouter un nouveau role</h3> </div>
								<div class="panel-body">
									<div class="col-md-6 col-md-6-form" style="margin-left:10%;">
										<form role="form" method="post" action="">
										
											<div class="form-group">
												<label>Nom Role</label>
												<input type="text" name="nom" class="form-control" >
											</div>
											
											
											
											<div class="form-group">
												<label>Status</label>
												<select class="form-control" name="status">
													<option value="1">Actif</option>
													<option value="0">Inactif</option>
												</select>
											</div>
											
											
											<div class="panel panel-default">
												<!-- Default panel contents -->
												<div class="panel-heading-gray"><h3>Permissions</h3></div>
												<!-- List group -->
												<ul class="list-group">';
												
													foreach ($thePermissions as $key => $value)
													{

														echo '<li class="list-group-item"><input type="checkbox" id="checkbox-fa-light-1" value="'.$value['name'].'" name="permission[]"> &nbsp;&nbsp;&nbsp; '.$value['name'].'</li>';
															
													}
													
												echo'</ul>
											</div>
											
											
											
											<input type="submit" name="save" class="btn btn-default" value="Enregistrer" />
										</div>
										
									</form>
								</div>
							</div>
						</div><!-- /.col-->
					</div><!-- /.row -->
				';
			}
			else
			{
				
				echo '
				
					<div class="action-bar bottom topic-actions view-topic  ">

						<div class="float-left">
							
							<div class="btn btn-default navbar-btn">
								<a href=""> Total : &nbsp;&nbsp;<span class="badge">'.$Role->doRoleCount().'</span></a>
							</div>
							
							<div class="btn btn-default navbar-btn">
								<a href="/role.php?q=add" class="">Ajouter</a>
							</div>

						</div><!-- /.float-left --> 


						<div class="float-right">
						
							<div class="btn btn-default navbar-btn">
								<a href="/role.php" >Retour</a>
							</div>
	
						</div><!-- /.float-right -->
					</div>

					<div class="clear"></div>

					
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-heading"><h3 style="color:white;">Liste des roles</h3> </div>
								<div class="panel-body">
									<!--<table class="table table-bordred table-striped" data-toggle="table" data-url="adminbaba/tables/usertable.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="asc">-->
									<table class="table table-bordred table-striped" data-toggle="table" data-url="table.role.php"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="asc">
										<thead class="thead-inverse">
										<tr>
											<!--<th data-field="state" data-checkbox="true" >Item ID</th>-->
											<th data-field="id"     data-sortable="true">ID</th>
											<th data-field="name"   data-sortable="true">Label</th>										
											<th data-field="status"  data-sortable="true" data-align="center">Status</th>
											<th data-field="permission"   data-sortable="true">Permission</th>
											<th data-field="update" data-align="center" >Modifier</th>
											<!--<th data-field="delete" data-align="center" >Supprimer</th>-->
										</tr>
										</thead>
									</table>
								</div>
							</div>
						</div>
					</div><!--/.row-->
				';
				
			}
		?>
		
		
		
	
	
	<div class="clear"></div>

</div> <!-- /#page-body -->
</div> <!-- /#wrap -->




<div id="page-footer">&copy; Aout 2016</div><!-- /#page-footer -->




<!-- JQUERY : 
<script src="assets/js/jquery.min.js"></script>-->

<!-- BOOTSTRAP JS 
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>-->



<script src="adminbaba/js/jquery-1.11.1.min.js"></script>
	<script src="adminbaba/js/bootstrap.min.js"></script>
	<!--<script src="adminbaba/js/chart.min.js"></script>
	<!--<script src="adminbaba/js/chart-data.js"></script>-->
	<!--<script src="adminbaba/js/easypiechart.js"></script>-->
	<!--<script src="adminbaba/js/easypiechart-data.js"></script>-->
	<!--<script src="adminbaba/js/bootstrap-datepicker.js"></script>-->
	<script src="adminbaba/js/bootstrap-table.js"></script>
	
</body>
</html>

<? ob_end_flush(); ?>
