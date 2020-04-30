<?php 
    session_start();
    include('../base/base.php');
	include("villeAPI.php");

    if($_POST["facture"]){
        $factures = $_POST["facture"];
        $qt = $_POST["qt"];
		$typeCmd = $_POST["typeCmd"];
		$ref = $_POST["ref"];
       
        
           for($i=0;$i<count($factures);$i++){
			
            $reqUser = $bdd->prepare("SELECT * FROM facture WHERE Code_facture = ?");	

	        $reqUser->execute(array($factures[$i]));

            $userInfo = $reqUser->fetch();
            
           
             $Nom_client = $userInfo['Nom_client'];
				$Prenom_client = $userInfo['Prenom_client'];
				$Email_client = $userInfo['Email_client'];
                $Telephone_client = $userInfo['Telephone_client'];
                
				$Nom_menu_commnder =$userInfo['Nom_menu_commnder'];
				$Description_menu_commnder = $userInfo['Description_menu_commnder'];
				$Quantiter_menu_commnder = intVal($qt[$i]);
				$Categories_menu_commnder = $userInfo["Categories_menu_commnder"];
				$Mode_de_paiement = $typeCmd;

				$Date_du_commande = date('d/m/y') ;
				$Heure_du_commande = date('H:i:s');
				$Prix_du_commande = ($userInfo["Prix_du_commande"] / $userInfo["Quantiter_menu_commnder"]) * $qt[$i];
				
				$Ville_client = $ville;//$_POST['Ville_client']));
				$Code_postale_client = $codepostale;// $_POST['Code_postale_client']));
				$file = "images/";
				
				
								 
				$insertMembre = $bdd->prepare("INSERT INTO commande_valider(file,ref,Nom_client,Prenom_client,Email_client,Telephone_client,Nom_menu_commnder,Description_menu_commnder,Quantiter_menu_commnder,Categories_menu_commnder,Date_du_commande,Heure_du_commande,Prix_du_commande,Mode_de_paiement,Ville_client,Code_postale_client) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
									
				$insertMembre->execute(array($file,$ref,$Nom_client,$Prenom_client,$Email_client,$Telephone_client,$Nom_menu_commnder,$Description_menu_commnder,$Quantiter_menu_commnder,$Categories_menu_commnder,$Date_du_commande,$Heure_du_commande,$Prix_du_commande,$Mode_de_paiement,$Ville_client,$Code_postale_client));

	  } 
        	echo "insertion résussi"; 
    }
?>