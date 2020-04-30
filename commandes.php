<?php


	
	include('../base/base.php');

	if(isset($_GET['Num_prestataire']) AND $_GET['Num_prestataire'] > 0){
		
	$getId = intval($_GET['Num_prestataire']);
		
	$reqUser = $bdd->prepare("SELECT * FROM prestataire WHERE Num_prestataire = ?");	

	$reqUser->execute(array($getId));

	$userInfo = $reqUser->fetch();


	if(isset($_GET['id_commande_valider']) AND $_GET['id_commande_valider'] > 0){
		
	$getId = intval($_GET['id_commande_valider']);
		
	$reqUser = $bdd->prepare("SELECT * FROM commande_valider WHERE id_commande_valider = ?");	

	$reqUser->execute(array($getId));

	$commande = $reqUser->fetch();
	
	
	
	if(isset($_POST['valider'])){
		
		if(isset($_POST['id_commande_valider']) AND isset($_POST['Nom_client']) AND isset($_POST['Prenom_client']) AND isset($_POST['Email_client']) AND isset($_POST['Telephone_client']) AND isset($_POST['Ville_client']) AND isset($_POST['Code_postale_client']) AND isset($_POST['Nom_etablissement_prestataire']) AND isset($_POST['Image_prestataire'])  AND isset($_POST['Ville_prestataire'])  AND isset($_POST['Postale_prestataire'])   AND isset($_POST['Numero_du_rue_prestataire']) AND isset($_POST['Rue_prestataire']) AND isset($_POST['Telephone_prestataire']) AND isset($_POST['Email_prestataire'])  AND isset($_POST['Nom_menu_commnder'])  AND isset($_POST['Description_menu_commnder'])  AND isset($_POST['Categories_menu_commnder'])  AND isset($_POST['Quantiter_menu_commnder'])  AND isset($_POST['Prix_du_commande'])  AND isset($_POST['Date_du_commande'])  AND isset($_POST['Heure_du_commande'])  AND isset($_POST['Mode_de_paiement']) ){
			if(!empty($_POST['id_commande_valider']) AND !empty($_POST['Nom_client']) AND !empty($_POST['Prenom_client']) AND !empty($_POST['Email_client']) AND !empty($_POST['Telephone_client']) AND !empty($_POST['Ville_client']) AND !empty($_POST['Code_postale_client']) AND !empty($_POST['Nom_etablissement_prestataire']) AND !empty($_POST['Image_prestataire']) AND !empty($_POST['Ville_prestataire']) AND !empty($_POST['Postale_prestataire'])  AND !empty($_POST['Numero_du_rue_prestataire'])  AND !empty($_POST['Rue_prestataire'])  AND !empty($_POST['Telephone_prestataire'])  AND !empty($_POST['Email_prestataire'])   AND !empty($_POST['Nom_menu_commnder'])   AND !empty($_POST['Description_menu_commnder'])   AND !empty($_POST['Categories_menu_commnder'])   AND !empty($_POST['Quantiter_menu_commnder'])   AND !empty($_POST['Prix_du_commande'])   AND !empty($_POST['Date_du_commande'])   AND !empty($_POST['Heure_du_commande'])   AND !empty($_POST['Mode_de_paiement']) ){
				
				$id_commande_valider = htmlspecialchars(trim($_POST['id_commande_valider']));
				$Nom_client = htmlspecialchars(trim($_POST['Nom_client']));
				$Prenom_client = htmlspecialchars(trim($_POST['Prenom_client']));
				$Email_client = htmlspecialchars(trim($_POST['Email_client']));
				$Telephone_client = htmlspecialchars(trim($_POST['Telephone_client']));
				$Ville_client = htmlspecialchars(trim($_POST['Ville_client']));
				$Code_postale_client = htmlspecialchars(trim($_POST['Code_postale_client']));
				$Nom_etablissement_prestataire = htmlspecialchars(trim($_POST['Nom_etablissement_prestataire']));
				$Image_prestataire = htmlspecialchars(trim($_POST['Image_prestataire']));
				$Ville_prestataire = htmlspecialchars(trim($_POST['Ville_prestataire']));
				$Postale_prestataire = htmlspecialchars(trim($_POST['Postale_prestataire']));
				$Numero_du_rue_prestataire = htmlspecialchars(trim($_POST['Numero_du_rue_prestataire']));
				$Rue_prestataire = htmlspecialchars(trim($_POST['Rue_prestataire']));
				$Telephone_prestataire = htmlspecialchars(trim($_POST['Telephone_prestataire']));
				$Email_prestataire = htmlspecialchars(trim($_POST['Email_prestataire']));
				$Nom_menu_commnder = htmlspecialchars(trim($_POST['Nom_menu_commnder']));
				$Description_menu_commnder = htmlspecialchars(trim($_POST['Description_menu_commnder']));
				$Categories_menu_commnder = htmlspecialchars(trim($_POST['Categories_menu_commnder']));
				$Quantiter_menu_commnder = htmlspecialchars(trim($_POST['Quantiter_menu_commnder']));
				$Prix_du_commande = htmlspecialchars(trim($_POST['Prix_du_commande']));
				$Date_du_commande = htmlspecialchars(trim($_POST['Date_du_commande']));
				$Heure_du_commande = htmlspecialchars(trim($_POST['Heure_du_commande']));
				$Mode_de_paiement = htmlspecialchars(trim($_POST['Mode_de_paiement']));
				
						$ref  = $_POST["ref"];
																			 
					 $insertMembre = $bdd->prepare("INSERT INTO facture(id_commande_valider,ref_commande,Nom_client,Prenom_client,Email_client,Telephone_client,Ville_client,Code_postale_client,Nom_etablissement_prestataire,Image_prestataire,Ville_prestataire,Postale_prestataire,Numero_du_rue_prestataire,Rue_prestataire,Telephone_prestataire,Email_prestataire,Nom_menu_commnder,Description_menu_commnder,Categories_menu_commnder,Quantiter_menu_commnder,Prix_du_commande,Date_du_commande,Heure_du_commande,Mode_de_paiement) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
														
					$insertMembre->execute(array($id_commande_valider,$ref,$Nom_client,$Prenom_client,$Email_client,$Telephone_client,$Ville_client,$Code_postale_client,$Nom_etablissement_prestataire,$Image_prestataire,$Ville_prestataire,$Postale_prestataire,$Numero_du_rue_prestataire,$Rue_prestataire,$Telephone_prestataire,$Email_prestataire,$Nom_menu_commnder,$Description_menu_commnder,$Categories_menu_commnder,$Quantiter_menu_commnder,$Prix_du_commande,$Date_du_commande,$Heure_du_commande,$Mode_de_paiement));
														
						$erreur = "<p style='color:white; background:#40ba37;'>Votre compte a bien été créé <span style='color:red;'> &hearts;</span></p>";
																			
															
															
					header("location:supprimer.php?Num_prestataire=".$userInfo['Num_prestataire']."&id_commande_valider=".$commande['id_commande_valider']);
																							
																			
									
			}
		}
	}
	


?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>COMMANDES</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="icon" href="images/core-img/pizza.png">
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
            class="fas fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Layout Options
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/layout/top-nav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Top Navigation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Top Navigation + Sidebar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/boxed.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Boxed</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Sidebar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-topnav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Navbar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-footer.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Footer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Collapsed Sidebar</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Charts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ChartJS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Flot</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inline</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                UI Elements
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/UI/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/icons.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Icons</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/buttons.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buttons</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/sliders.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sliders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/modals.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Modals & Alerts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/navbar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Navbar & Tabs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/timeline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Timeline</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/ribbons.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ribbons</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Forms
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/forms/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General Elements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/advanced.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Advanced Elements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/editors.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Editors</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/validation.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Validation</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Tables
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/tables/simple.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Simple Tables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/data.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>DataTables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/jsgrid.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>jsGrid</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">EXAMPLES</li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Calendar
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Gallery
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Mailbox
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/mailbox/mailbox.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compose</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/read-mail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Read</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Pages
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/examples/invoice.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/profile.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/e-commerce.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>E-commerce</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/projects.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Projects</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project-add.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project-edit.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Edit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project-detail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Detail</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/contacts.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contacts</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Extras
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/examples/login.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Login</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/register.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Register</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/forgot-password.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Forgot Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/recover-password.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Recover Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/lockscreen.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lockscreen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/legacy-user-menu.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Legacy User Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/language-menu.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Language Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/404.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Error 404</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/500.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Error 500</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/pace.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pace</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/blank.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blank Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="starter.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Starter Page</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">MISCELLANEOUS</li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs/3.0" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Documentation</p>
            </a>
          </li>
          <li class="nav-header">MULTI LEVEL EXAMPLE</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Level 1</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Level 1
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Level 2
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Level 1</p>
            </a>
          </li>
          <li class="nav-header">LABELS</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Important</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Warning</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Informational</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Commande</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v3</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title"><?= $commande['Nom_menu_commnder'] ?></h3>
                </div>
              </div>
              <div class="card-body">
			  

					<img src="../pizza-reunion-administrator/pages/forms/<?= $commande['file'] ?>" style="width:100%; height:650px;"/>

              </div>
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header border-0">
				
              </div>
              <div class="card-body">
			  
				<form method="post">
				
					<input type="text" value="<?= $commande['id_commande_valider'] ?>" name="id_commande_valider" style="display:none;"/>
					
					
					<input type="text" value="<?= $commande['Nom_client'] ?>" name="Nom_client" style="display:none;"/>
					<input type="text" value="<?= $commande['Prenom_client'] ?>" name="Prenom_client" style="display:none;"/>
					<input type="text" value="<?= $commande['Email_client'] ?>" name="Email_client" style="display:none;"/>
					<input type="text" value="<?= $commande['Telephone_client'] ?>" name="Telephone_client" style="display:none;"/>
					<input type="text" value="<?= $commande['Ville_client'] ?>" name="Ville_client" style="display:none;"/>
					<input type="text" value="<?= $commande['Code_postale_client'] ?>" name="Code_postale_client" style="display:none;"/>
					<input type='hidden' value="<?= $commande['ref'] ?>" name='ref' />
					<input type="text" value="<?= $userInfo['Nom_etablissement'] ?>" name="Nom_etablissement_prestataire" style="display:none;"/>
					<input type="text" value="<?= $userInfo['nom_file'] ?>" name="Image_prestataire" style="display:none;"/>
					<input type="text" value="<?= $userInfo['Ville_prestataire'] ?>" name="Ville_prestataire" style="display:none;"/>
					<input type="text" value="<?= $userInfo['Postale'] ?>" name="Postale_prestataire" style="display:none;"/>
					<input type="text" value="<?= $userInfo['Numero_du_rue'] ?>" name="Numero_du_rue_prestataire" style="display:none;"/>
					<input type="text" value="<?= $userInfo['Rue'] ?>" name="Rue_prestataire" style="display:none;"/>
					<input type="text" value="<?= $userInfo['Telephone'] ?>" name="Telephone_prestataire" style="display:none;"/>
					<input type="text" value="<?= $userInfo['Email'] ?>" name="Email_prestataire" style="display:none;"/>
					
					
					
					<input type="text" value="<?= $commande['Nom_menu_commnder'] ?>" name="Nom_menu_commnder" style="display:none;"/>
					<input type="text" value="<?= $commande['Description_menu_commnder'] ?>" name="Description_menu_commnder" style="display:none;"/>
					<input type="text" value="<?= $commande['Categories_menu_commnder'] ?>" name="Categories_menu_commnder" style="display:none;"/>
					<input type="text" value="<?= $commande['Quantiter_menu_commnder'] ?>" name="Quantiter_menu_commnder" style="display:none;"/>
					<input type="text" value="<?= $commande['Prix_du_commande'] ?>" name="Prix_du_commande" style="display:none;"/>
					
					<input type="text" value="<?= $commande['Date_du_commande'] ?>" name="Date_du_commande" style="display:none;"/>
					<input type="text" value="<?= $commande['Heure_du_commande'] ?>" name="Heure_du_commande" style="display:none;"/>
					
					<input type="text" value="<?= $commande['Mode_de_paiement'] ?>" name="Mode_de_paiement" style="display:none;"/>
					
					
					
                <div class="d-flex content-between align-items-center border-bottom mb-3">
                  <p class="text-success text-xl">
                  </p>
                    
						<button type="submit" name="valider" class="btn btn-info" style="background:#007bff; width:100%;">Valider</button>
					
                </div>
				
				</form>
			  
			  
			  
				
			  
                <div class="d-flex content-between align-items-center border-bottom mb-3">
                  <p class="text-success text-xl">
                  </p>
                  <p class="d-flex flex-column text-left">
                    
                  </p>
                </div>
			  
                <div class="d-flex content-between align-items-center border-bottom mb-3">
                  <p class="text-success text-xl">
                  </p>
                    
						<button class="btn btn-danger" style="background:#e83e8c; width:100%;">Annuler</button>
                 
                </div>
				
			  
			  
				
				
				
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <h2 class="">Descriptions du produit</h2>
               
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  </thead>
                  <tbody>
                  <tr>
                    <td>
                      <b>Produit</b>
                    </td>
                    <td style="width:100%; text-align:center;"><?= $commande['Nom_menu_commnder'] ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                   
                  
                  </tr>
                  <tr>
                    <td>
                      <b>Ingrédients</b>
                    </td>
                    <td style="width:100%; text-align:center;"><?= $commande['Description_menu_commnder'] ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>
                      <b>Catégories</b>
                    </td>
                    <td style="width:100%; text-align:center;"><?= $commande['Categories_menu_commnder'] ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>
                      <b>Quatités</b>
                    </td>
                    <td style="width:100%; text-align:center;"><?= $commande['Quantiter_menu_commnder'] ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr><tr>
                    <td>
                      <b>Prix</b>
                    </td>
                    <td style="width:100%; text-align:center;"><?= $commande['Prix_du_commande'] ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header border-0">
                <h2 class="">Informations client</h2>
				
              </div>
              <div class="card-body">
			  
			  
                <div class="d-flex content-between align-items-center border-bottom mb-3">
                  <p class="text-success text-xl">
                  </p>
                  <p class="d-flex flex-column text-left">
                    
                    <span class="text-muted">NOM : <?= $commande['Nom_client'] ?></span>
                  </p>
                </div>
				
			  
                <div class="d-flex content-between align-items-center border-bottom mb-3">
                  <p class="text-success text-xl">
                  </p>
                  <p class="d-flex flex-column text-left">
                    
                    <span class="text-muted">PRÉNOM : <?= $commande['Prenom_client'] ?></span>
                  </p>
                </div>
				
			  
                <div class="d-flex content-between align-items-center border-bottom mb-3">
                  <p class="text-success text-xl">
                  </p>
                  <p class="d-flex flex-column text-left">
                    
                    <span class="text-muted">EMAIL : <?= $commande['Email_client'] ?></span>
                  </p>
                </div>
				
			  
                <div class="d-flex content-between align-items-center border-bottom mb-3">
                  <p class="text-success text-xl">
                  </p>
                  <p class="d-flex flex-column text-left">
                    
                    <span class="text-muted">TÉLÉPHONE : <?= $commande['Telephone_client'] ?></span>
                  </p>
                </div>
				
                <div class="d-flex content-between align-items-center border-bottom mb-3">
                  <p class="text-success text-xl">
                  </p>
                  <p class="d-flex flex-column text-left">
                    
                    <span class="text-muted">VILLE : <?= $commande['Ville_client'] ?></span>
                  </p>
                </div>
				
                <div class="d-flex content-between align-items-center border-bottom mb-3">
                  <p class="text-success text-xl">
                  </p>
                  <p class="d-flex flex-column text-left">
                    
                    <span class="text-muted">CODE POSTALE : <?= $commande['Code_postale_client'] ?></span>
                  </p>
                </div>
				
				
				
              </div>
            </div>
			
			<div class="card col-lg-12">
              <div class="card-header border-0">
                <h2 class="">Commande</h2>
				
              </div>
              <div class="card-body">
			  
			  
                <div class="d-flex content-between align-items-center border-bottom mb-3">
                  <p class="text-success text-xl">
                  </p>
                  <p class="d-flex flex-column text-left">
                    
                    <span class="text-muted">MODE DE PAIEMENT : <?= $commande['Mode_de_paiement'] ?></span>
                  </p>
                </div>
				
                <div class="d-flex content-between align-items-center border-bottom mb-3">
                  <p class="text-success text-xl">
                  </p>
                  <p class="d-flex flex-column text-left">
                    
                    <span class="text-muted">DATE : <?= $commande['Date_du_commande'] ?></span>
                  </p>
                </div>
				
			  
                <div class="d-flex content-between align-items-center border-bottom mb-3">
                  <p class="text-success text-xl">
                  </p>
                  <p class="d-flex flex-column text-left">
                    
                    <span class="text-muted">HEURE : <?= $commande['Heure_du_commande'] ?></span>
                  </p>
                </div>
				
			  
				
			  
				
				
				
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.4
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<script src="dist/js/demo.js"></script>
<script src="dist/js/pages/dashboard3.js"></script>
</body>
</html>
<?php
		}
	}
?>