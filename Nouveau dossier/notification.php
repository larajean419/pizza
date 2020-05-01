<?php

session_start();

	include('../../base/base.php');
	

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

    <div class="main" style="background:url('images/bg_4.jpg');overflow:hidden; margin-top:100px;">

        <div class="container">
            <div class="signup-content">
               
				<div class="signup-img" style="background-color:#fac564; text-align:center;">
				
				<br>
						<img src="images/Logo-v.4-coins-arrondis-petit.png" alt="" style="width:20%;">
                     <h3 style="font-weight:bold; color:white; margin-top:-10px;">PIZZA REUNION </h3>
                    
					
                        <h2>Nous vous remercion de votre commande </h2>
					
					
                </div>
                <div class="signup-form">
					
					<div class="col-lg-12" style="text-align:center; color:white; background-color:tomato; font-size:18px; font-weight:bold;">
							<?php
							
								if(isset($erreurs)){
									echo $erreurs;
								}
							
							?>
							
							
					</div>
					<div class="col-lg-12" style="text-align:center; color:white; background-color:tomato; font-size:18px; font-weight:bold;">
							<?php
							
								if(isset($erreurs)){
									echo $erreurs;
								}
							
							?>
							
							
					</div>
					
							<div class="register-form col-lg-12" id="register-form" style="width:100%;height:500px; margin-top">
							
							<input type='hidden' value=<?= $_GET["id_client"] ?> id='idCliForNotif' />
										<input type='hidden' value=<?= $_GET["ref_commande"] ?> id="refCmdForNotif" />
										<!--info here-->
									
								<div class="col-lg-12" id="presta_valider" style="background-color:; margin-left:-60px; height:450px; width:95%;">
									<h3 id='notifContainer' for="meal_preference" style="color:#fac564; font-size:20px;">
									
									</h3>
								</div>
										
										
							</div>
							
							
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
	initDisplay()
		
		function initDisplay(){
			setTimeout(() => {

			let data = getPrestataireInfo()
			
			let res = ''
			 if(data){
				
				res ="<h2 for='meal_preference' style='color:#fac564; width:100%; text-align:center; margin-top:-100px;'>"+
        "<img src='../../pizza-reunion-administrator/pages/forms/"+data.Image_prestataire+"' style='height:300px; border-radius:200px;' />"+
    "</h2>"+
    "<h2 for='meal_preference' style='color:#fac564; width:100%; text-align:center;'>"+
        "Votre commandes à été valider par <span>"+data.Nom_etablissement_prestataire+"</span>"+
    "</h2>"+
    "<div class='form-input' style='text-align:center;'>"+
        "<label for='chequeno'>"+
            "<span>"+data.Ville_prestataire+"</span>,"+
            "<span>"+data.Postale_prestataire+"</span>,"+
            "rue <span>"+data.Rue_prestataire+"</span>,"+
            "<span>"+data.Numero_du_rue_prestataire+"</span>"+
        "</label>"+
        "<label for='chequeno'>"+
            "Téléphone : <span>"+data.Telephone_prestataire+"</span><br> "+
            "Mail: <span>"+data.Email_prestataire+"</span> "+
        "</label>"+
        "<br>"+
        "<br>"+
        "<label for='chequeno'>"+
             "<a href='factures/index.php?Code_facture="+data.ref_commande+"'>"+
                
                "<button class='btn btn-info' "+
                    "style='padding:20px; background-color:#fac564; border:1px solid #fac564; color:white; cursor:pointer; font-size:18px; font-weight:bold;'>"+
                    "Continuer et procèder au paiement "+
                "</button>"+
            "</a>"+
        "</label>"+
    "</div>"

			}else{
				res = "<div class='col-lg-12'>"+
    "<h3 for='meal_preference' style='color:#fac564; font-size:20px;'>"+
		"VOTRE COMMANDE VAS ÊTRE VALIDER PAR UN DE NOS PRESTATAIRE DANS QUELQUES INSTANT"+
	"</h3>"+
"</div>"
			}

			$("#notifContainer").html(res) 
			initDisplay()
		}, 3000);
		}								
		function getPrestataireInfo(){
			let idCli = $("#idCliForNotif").val()
			let ref = $("#refCmdForNotif").val()

			
			let res = 0
			$.ajax({
				method: "get",
				url: "prestataireInfo.php?ref_commande="+ref,
				dataType: "json",
				async : false,
				success: function (response) {
					
					res = response
				}
			});

			return res
		}
	</script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>


