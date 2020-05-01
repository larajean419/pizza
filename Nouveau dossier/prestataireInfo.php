<?php 
    	include('../../base/base.php');

        

        $reqFactValidate = $bdd->prepare("SELECT * FROM facture where ref_commande = ? ");
        $reqFactValidate->execute(array($_GET['ref_commande']));
    
        $fact = $reqFactValidate->fetch();

      

        echo json_encode($fact);
?>