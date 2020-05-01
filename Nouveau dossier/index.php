<?php

session_start();
	
	include('../../base/base.php');
	include("../villeAPI.php");

	if(isset($_GET['id_client']) AND $_GET['id_client'] > 0){
		
	$getId = intval($_GET['id_client']);
		
	$reqUser = $bdd->prepare("SELECT * FROM client WHERE id_client = ?");	

	$reqUser->execute(array($getId));

	$userInfo = $reqUser->fetch();
	
	
	
	if(isset($_GET['pizza']) AND $_GET['pizza'] > 0){
		
	$getId = intval($_GET['pizza']);
		
	$reqUser = $bdd->prepare("SELECT * FROM produit WHERE Code_produit = ?");	

	$reqUser->execute(array($getId));

	$pizza = $reqUser->fetch();
	
	
	$enfant = 6.00;
	
	
	
	
	
	
	$reqcommandeValder = $bdd->prepare("SELECT * FROM commande_pres_valider ORDER BY Id_commande DESC");
		
	$executeIsOk4 = $reqcommandeValder->execute();
									
	$commande = $reqcommandeValder->fetch();
	
	
	if($commande['Categorie']=="33 cm"){
		$price = $pizza['Prix_33'];
	}
	
	if($commande['Categorie']=="40 cm"){
		$price = $pizza['Prix_40'];
	}
	if($commande['Categorie']=="Pizza enfant (26 cm)"){
		$price = $enfant;
	}


	if(isset($_POST['valider'])){
		if(isset($_POST['Mode_de_paiement']) AND isset($_POST['Nom_client']) AND isset($_POST['Prenom_client'])  AND isset($_POST['Email_client']) AND isset($_POST['Telephone_client'])){
			if(!empty($_POST['Mode_de_paiement']) AND !empty($_POST['Nom_client']) AND !empty($_POST['Prenom_client']) AND !empty($_POST['Email_client']) AND !empty($_POST['Telephone_client'])){
				
				
		
				$Nom_client = htmlspecialchars(trim($_POST['Nom_client']));
				$Prenom_client = htmlspecialchars(trim($_POST['Prenom_client']));
				$Email_client = htmlspecialchars(trim($_POST['Email_client']));
				$Telephone_client = htmlspecialchars(trim($_POST['Telephone_client']));
				$Nom_menu_commnder = htmlspecialchars(trim($_POST['Nom_menu_commnder']));
				$Description_menu_commnder = htmlspecialchars(trim($_POST['Description_menu_commnder']));
				$Quantiter_menu_commnder = htmlspecialchars(trim($_POST['Quantiter_menu_commnder']));
				$Categories_menu_commnder = htmlspecialchars(trim($_POST['Categories_menu_commnder']));
				$Date_du_commande = htmlspecialchars(trim($_POST['Date_du_commande']));
				$Heure_du_commande = htmlspecialchars(trim($_POST['Heure_du_commande']));
				$Prix_du_commande = htmlspecialchars(trim($_POST['Prix_du_commande']));
				$Mode_de_paiement = htmlspecialchars(trim($_POST['Mode_de_paiement']));
				$Ville_client = $ville;//htmlspecialchars(trim($_POST['Ville_client']));
				$Code_postale_client = $codepostale;// htmlspecialchars(trim($_POST['Code_postale_client']));
				$file = htmlspecialchars(trim($_POST['file']));
                
                
                $ref= $_POST["refCmd"];
								 
					 $insertMembre = $bdd->prepare("INSERT INTO commande_valider(file,ref,Nom_client,Prenom_client,Email_client,Telephone_client,Nom_menu_commnder,Description_menu_commnder,Quantiter_menu_commnder,Categories_menu_commnder,Date_du_commande,Heure_du_commande,Prix_du_commande,Mode_de_paiement,Ville_client,Code_postale_client) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
									
					$insertMembre->execute(array($file,$ref,$Nom_client,$Prenom_client,$Email_client,$Telephone_client,$Nom_menu_commnder,$Description_menu_commnder,$Quantiter_menu_commnder,$Categories_menu_commnder,$Date_du_commande,$Heure_du_commande,$Prix_du_commande,$Mode_de_paiement,$Ville_client,$Code_postale_client));
									
					$erreur = "<p style='color:white; background:#40ba37;'>Votre compte a bien été créé <span style='color:red;'> &hearts;</span></p>";
										
					
					$reqcommandeVal= $bdd->prepare("SELECT * FROM commande_valider ORDER BY id_commande_valider DESC");
						
					$executeIsOk4 = $reqcommandeVal->execute();
													
					$id_commande_valider = $reqcommandeVal->fetch();
	
						
				    header("location:notification.php?id_client=".$userInfo['id_client']."&ref_commande=".$ref);																
																				
																
			}else{
				$erreurs = "Veuillez saisir tous les champs ";
			}						
		}						
								
		
	}
	
	


	

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>¨PIZZA REUNION / COMMANDES</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="images/core-img/pizza.png">
	
	<style>
	
		#slect{
			width:100%;
			height:50px;
			font-size:16px;
			padding:15px;
			border:1px solid #ebebeb;
		}
	
	</style>
	
</head>
<body style="background:url('images/bg_4.jpg');">

    <div class="main" style="background:url('images/bg_4.jpg');overflow:hidden;">

        <div class="container">
            <div class="signup-content">
               
				<div class="signup-img" style="background-color:#fac564; text-align:center;">
				
				<br>
						<img src="images/Logo-v.4-coins-arrondis-petit.png" alt="" style="width:20%;">
                     <h3 style="font-weight:bold; color:white; margin-top:-10px;">PIZZA REUNION </h3>
                    <div class="signup-img-content">
					
                        <h2><?= $pizza['Nom_menu']?> </h2>
                    <img src="../../pizza-reunion-administrator/pages/forms/<?= $pizza['file']?>" alt="" style="height:250;">
					
					
					
                     <h3>Ingrédients </h3>
					<hr>
					   <p><?= $pizza['Description']?> </p>
					<hr>
					
                    </div>
                </div>
                <div class="signup-form">
					
					<div class="col-lg-12" style="text-align:center; color:white; background-color:tomato; font-size:18px; font-weight:bold;">
							<?php
							
								if(isset($erreurs)){
									echo $erreurs;
								}
							
							?>
					</div>
					
                    <form method="POST" class="register-form" id="register-form">
                        <div class="form-row">
                            <div class="form-group">
                                 <h2 for="meal_preference" style="color:#fac564;">Informations</h2>
                                <div class="form-input">
                                    <label for="first_name" class="required">Nom</label>
                                    <input type='hidden' id='refCmd' name='refCmd'/>
                                    <input type="text" name="Nom_client" id="first_name" value="<?= $userInfo['Nom'] ?>" placeholder="Nom" required />
                                </div>
                                <div class="form-input">
                                    <label for="last_name" class="required">Prénom</label>
                                    <input type="text" name="Prenom_client" id="last_name" value="<?= $userInfo['Pseudo'] ?>" placeholder="Prénom" required />
                                </div>
                                <div class="form-input">
                                    <label for="email" class="required">Email</label>
                                    <input type="email" name="Email_client" id="email" value="<?= $userInfo['Email'] ?>" placeholder="Adresse mail" required />
                                </div>
                                <div class="form-input">
                                    <label for="phone_number" class="required">Téléphone</label>
                                    <input type="text" name="Telephone_client" id="phone_number"value="<?= $userInfo['Telephone'] ?>"  placeholder="Téléphone" required />
                                </div>
                            </div>
                            <div class="form-group">
							
								<div class="form-group" style="background-color:;  width:100%; height:37%; position:absolute; z-index:999;"></div>
								
                                 <h2 for="meal_preference" style="color:#fac564;">Produits</h2>
                                <div class="form-input">
                                    <label for="chequeno">Pizza</label>
                                    <input type="text" name="Nom_menu_commnder" id="chequeno" value="<?= $pizza['Nom_menu']?>"/>
                                </div>
                                <div class="form-input">
                                    <label for="blank_name">Ingrédients   </label>
                                    <input type="text" name="Description_menu_commnder" id="blank_name" value="<?= $pizza['Description']?>"/>
                                </div>
                                <div class="form-input">
                                    <label for="payable">Catégories</label>
                                    <input type="text" name="Categories_menu_commnder" id="payable" value="<?= $commande['Categorie'] ?>"/>
                                </div>
                                <div class="form-input">
                                    <label for="payable">Quantités</label>
                                    <input type="text" name="Quantiter_menu_commnder" id="payable" value="<?= $commande['Quantiter'] ?>"/>
                                </div>
								
								
                                <div class="form-input" style="display:none;">
                                    <label for="payable">Date</label>
                                    <input type="text" name="Date_du_commande" id="payable" value="<?= date('d/m/y') ?>"/>
                                </div>
								
                                <div class="form-input" style="display:none;">
                                    <label for="payable">Heure</label>
                                    <input type="text" name="Heure_du_commande" id="payable" value="<?= date('H:i:s') ?>"/>
                                </div>
								
                                <div class="form-input" style="display:none;">
                                    <label for="payable">Prix</label>
                                    <input type="text" name="Prix_du_commande" id="payable" value="<?= $price * $commande['Quantiter'] ?>"/>
                                </div>
								
                                <div class="form-input" style="display:none;">
                                    <label for="payable">ville</label>
                                    <input type="text" name="Ville_client" id="payable" value="<?= $ville ?>"/>
                                </div>
								
                                <div class="form-input" style="display:none;">
                                    <label for="payable">Code Postale</label>
                                    <input type="text" name="Code_postale_client" id="payable" value="<?= $codepostale ?>"/>
                                </div>
                                <div class="form-input" style="display:none;">
                                    <label for="payable">file</label>
                                    <input type="text" name="file" id="payable" value="<?= $pizza['file']?>"/>
                                </div>
								
								
                            </div>
                        </div>
						<br>
						<br>
						<br>
						<br>
                        <div class="donate-us">
                                <div class="form-select">
                                    <div class="label-flex">
                                        <h2 for="meal_preference" style="color:#fac564;">Types de commande</h2>
                                    </div>
                                    <div class="select-list">
                                        <select name="Mode_de_paiement" id="slect" required >
                                            <option value="">Veilliez choisir </option>
                                            <option value="Sur place">Sur place</option>
                                            <option value="A emporter">A emporter</option>
                                        </select>
                                    </div>
                                </div>
							
						</div>
						
                        <div class="donate-us" style="text-align:center;">
                            <label>Prix (<?= $price ?> € * <?= $commande['Quantiter'] ?>)</label>
                            <div class="price_slider ui-slider ui-slider-horizontal">
                                <div class="submit" style="background-color:#fac564; color:white; line-height:50px; cursor:auto; font-size:20px;">
																
									<?php
												
										if(isset($price)){
											echo $price * $commande['Quantiter'];
											echo " €";
										}
												
									?>
								</div>
                            </div>
                        </div>
                        <div class="form-submit"style="text-align:center;">
                            <input type="submit" value="Valider" class="submit" id="submit" name="valider" />
                            
							<a href="../pizza.php?pizza=<?=$pizza['Code_produit']?>">
								<div class="submit" style="background-color:tomato; color:white; line-height:30px; text-align:center; height:30px;">
										Annuler
								</div>
							</a>	
								
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/nouislider/nouislider.min.js"></script>
    <script src="vendor/wnumb/wNumb.js"></script>
    <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="js/main.js"></script>

    <script>
        const now = new Date()

        const ref = Math.round(now.getTime() / 100000)
                console.log(ref)                          
        $("#refCmd").val(ref)
    </script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>

<?php
	}
}
?>