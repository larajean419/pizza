<?php 
    session_start();
    include('../base/base.php');
	include("villeAPI.php");
    
     $getId = $_POST["produit"][0]["idClient"];

    $reqUser = $bdd->prepare("SELECT * FROM client WHERE id_client = ?");	

	$reqUser->execute(array($getId));

    $userInfo = $reqUser->fetch(); //user info
    


    if($_POST["produit"]){
        $allProduits = $_POST["produit"];
        
         foreach($allProduits as $pdt){
			
             $getId = intval($pdt['codeProd']);
			$reqUser = $bdd->prepare("SELECT * FROM produit WHERE Code_produit = ?");
			
	        $reqUser->execute(array($getId));

            $pizza = $reqUser->fetch();  //current pizza info
            
           
             $Nom_client = $userInfo['Nom'];
				$Prenom_client = $userInfo['Pseudo'];
				$Email_client = $userInfo['Email'];
                $Telephone_client = $userInfo['Telephone'];
                
				$Nom_menu_commnder =$pizza['Nom_menu'];
				$Description_menu_commnder = $pizza['Description'];
				$Quantiter_menu_commnder = intVal($pdt["qt"]);
				$Categories_menu_commnder = $pdt["cat"];
				$Mode_de_paiement = $pdt["modePaiement"];
			
				$Date_du_commande = date('d/m/y') ;
				$Heure_du_commande = date('H:i:s');
				$Prix_du_commande = $pdt['prixU'] * $pdt["qt"];
				
				$Ville_client = $ville;//$_POST['Ville_client']));
				$Code_postale_client = $codepostale;// $_POST['Code_postale_client']));
				$file = "images/".$pizza["nom_image"];
				
				$ref = $pdt["ref"];		 

				$insertMembre = $bdd->prepare("INSERT INTO commande_valider(file,ref,Nom_client,Prenom_client,Email_client,Telephone_client,Nom_menu_commnder,Description_menu_commnder,Quantiter_menu_commnder,Categories_menu_commnder,Date_du_commande,Heure_du_commande,Prix_du_commande,Mode_de_paiement,Ville_client,Code_postale_client) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
									
				$insertMembre->execute(array($file,$ref,$Nom_client,$Prenom_client,$Email_client,$Telephone_client,$Nom_menu_commnder,$Description_menu_commnder,$Quantiter_menu_commnder,$Categories_menu_commnder,$Date_du_commande,$Heure_du_commande,$Prix_du_commande,$Mode_de_paiement,$Ville_client,$Code_postale_client));
			
	  } 
	  echo "insertion réussi";
        	
    }
?>