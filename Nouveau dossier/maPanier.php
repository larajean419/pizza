<?php
session_start();
	
	include('../base/base.php');
	require 'panier.class.php';
	$panier = new panier();

	if(isset($_GET['id_client']) AND $_GET['id_client'] > 0){
		
	$getId = intval($_GET['id_client']);
		
	$reqUser = $bdd->prepare("SELECT * FROM client WHERE id_client = ?");	

	$reqUser->execute(array($getId));

	$userInfo = $reqUser->fetch();
	
	if(isset($_SESSION['id_client']) AND $userInfo['id_client'] == $_SESSION['id_client']){
		
	
	
	if(isset($_POST['calculer'])){
		
		
		if(isset($_POST['catego']) AND isset($_POST['Quantiter'])){
			if(!empty($_POST['catego']) AND !empty($_POST['Quantiter'])){
				
				
			}	
		}
	}	
		
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>PIZZA REUNION</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">
    <link rel="icon" href="images/core-img/pizza.png">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="icon" href="images/core-img/pizza.png">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">

	
  </head>
  <body>
  <input type ='hidden' value= <?php echo $_GET["id_client"] ?> id='idClientForPanier'/>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container-fluid">
		<img src="images/Logo-v.4-coins-arrondis-petit.png" class="img-responsive" style="width:50px; margin-left:-5px;"/>
	      <a class="navbar-brand" style=" margin-left:5px;"> Pizza<br><small>Réunion</small></a>
		      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
		        <span class="oi oi-menu"></span> Menu
		      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="index.php?id_client=<?=$userInfo['id_client']?>" class="nav-link">Accueil</a></li>
	          <li class="nav-item"><a href="menu.php?id_client=<?=$userInfo['id_client']?>" class="nav-link">Nos menus</a></li>
	          <li class="nav-item"><a href="services.php?id_client=<?=$userInfo['id_client']?>" class="nav-link">Prestations de services</a></li>
	          <li class="nav-item"><a href="about.php?id_client=<?=$userInfo['id_client']?>" class="nav-link">À propos</a></li>
	          <li class="nav-item"><a href="partage.php?id_client=<?=$userInfo['id_client']?>" class="nav-link">Partages</a></li>
	          <li class="nav-item active"><a href="contact.php?id_client=<?=$userInfo['id_client']?>" class="nav-link">Contact</a></li>
	          <li class="nav-item active">
				<a href="maPanier.php?id_client=<?=$userInfo['id_client']?>" class="nav-link">
						<img src="images/panier.png" style="width:30px; height:30px; border-radius:30px;"/>
						 <span id="count" style="color:#e4b55d;"> (<?= $panier->count() ?></span>)
				</a>
			</li>
				<li class="nav-item  active"><a class="nav-link">|</a></li>
				<li class="nav-item  active"><a class="nav-link"><?= $userInfo['Pseudo'] ?></a></li>
				<li class="nav-item  active"><a class="nav-link">|</a></li>
				<li class="nav-item  active"><a href="deconnexion.php" class="nav-link">Déconnexion</a></li>
	        </ul>
	      </div>
		  </div>
	  </nav>		
		<?php
						
				if(isset($erreur)){
					
					?>

  	<nav class="" id="ftco-navbar" style="text-align:center;">
	    <div class="container">
		
		<?php					
					echo $erreur;
				}
						
		?>
			
		     
		  </div>
	  </nav>
	     
		 
		 
    
		<section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">VOTRE PANIER </h2>
            <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
          </div>
        </div>
    	</div>
			
			
			
				<div class="container">
					<form  method="post">
					<table border style="width:100%; height:300px; text-align:center; border:1px solid white;">
						<tr style="border:1px solid white;">
							<th style="color:white;">IMAGES</th>
							<th style="color:white;">PRODUITS</th>
							<th style="color:white;">CATEGORIES</th>
							<th style="color:white;">QUANTITES</th>
							<th style="color:white;">PRIX</th>
							<th style="color:white;">ACTION</th>
						</tr>
					
						 
						<tbody id='appendHere'>
						
						</tbody>

				
					<tr>
						<td style="color:white;">TOTAL</td>
				       
						<td id="totalHere" style="color:orange;border:1px solid white; font-weight:bold; font-size:18px;"></td>
						<input id='totalValueHere' type='hidden'  />
					</tr>
					</table>
					<br>
						
						<td>
                                        <select  id="typeCmdPanier2" required >
                                            <option value="">Type de commande </option>
                                            <option value="Sur place">Sur place</option>
                                            <option value="A emporter">A emporter</option>
                                        </select>
                         </td>    
						<button id='commanderPannier2'>Valider pour commander</button>
					</form>
				</div>
		
		</section>
		
	 <footer class="ftco-footer ftco-section img" style="padding:30px;">
    	<div class="overlay"></div>
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-4 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2"> <span class="flaticon-pizza">Pizza Réunion</span></h2>
              <p>Nous sommes une plateforme de commande de pizza en ligne; à emporter ou livraison gratuite et rapide.
				Passionné de cuisine et de recettes maison, nous vous proposons une sélection de pizzas, à chartres variée,
				notre carte met à l’honneur la cuisine italienne ainsi que plusieurs spécialités du monde.</p>
          
            </div>
          </div>
		  
          <div class="col-lg-4 col-md-6 mb-5 mb-md-5">
             <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Navigations</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Mention Légales</a></li>
                <li><a href="#" class="py-2 d-block">Condition Générales de ventes</a></li>
                <li><a href="#" class="py-2 d-block">Politique de confidentialité</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Contact</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Chemin Law Han Tien, 97400 Sainte-Clotilde </span></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">pizzareunion974@gmail.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center" style="margin-top:-50px;">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved |  <i class="icon-heart" aria-hidden="true"></i> by <a>Piiza Réunion</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
  <script src="js/app.js"></script>

  <script>
  const now = new Date()
	console.log(Math.round(now.getTime()/1000))
  initPanierTable('Prix_33') //init by default
calculTotal()

	$("#commanderPannier2").click((e)=>{
	
		e.preventDefault()
		
		let typeCmd = $("#typeCmdPanier2").val() //ok
		let categorie = $(".tailleForPaniers") // ok 
		let quantity = $(".qtForPaniers")  // ok 
		let idCli = $("#idClientForPanier").val()  //ok
		let prixtotal = $("#totalValueHere").val() //ok
		const now = new Date()
		let ref= Math.round(now.getTime() / 100000)
		 let pdt = getProduitInPanier()
		let panier = []

	 	for(i=0;i<pdt.length;i++){
			 let prixU = 0
			 let current = pdt.filter(el =>{
				 return el.Code_produit == pdt[i]["Code_produit"]
			 })
			prixU = categorie[i].value == "40 cm" ? current[0]["Prix_40"] : current[0]["Prix_33"]
		
			 let panierEl = {
				 ref : ref,
				prixU : prixU,
				modePaiement : typeCmd, //
				idClient : idCli, 
				qt : quantity[i].value, //
				cat : categorie[i].value,
				codeProd : pdt[i]["Code_produit"] 
			}
			panier.push(panierEl) 
		} 
 
		send(panier,ref)

		 setTimeout(() => {
			window.location.reload(true)
		},1500); 
 
	
});

function send(data,ref){
	let idCli = $("#idClientForPanier").val()
	$.ajax({
    	method: "post",
    	url : "commander_panier.php",
  		data : {
	  	produit : data
  		},
   
    success: function (response) {
        window.location.href= "notification.php?id_client"+idCli+"&ref_commande="+ref
	} 
})
}
function getProduitInPanier(){

	let produit = ""
	$.ajax({
    method: "get",
    url : "produitBySession.php",
   dataType : "json",
   async : false,
    success: function (response) {
        produit = response
	}
})

return produit
}

function initPanierTable(prixTaille){
	let panier = getProduitInPanier()
	let idCli = $("#idClientForPanier").val()
	let res = ""
	let somme = 0
	panier.forEach(el =>{
		
		res += '<tr style="border:1px solid white;"><td style="border:1px solid white;"><img src='+el["file"]+'  width="70" alt=""></td>\
							<td style="border:1px solid white;">'+el["Nom_menu"]+'</td>\
							<td style="border:1px solid white;">\
								<select style="width:100%; height:110px;" class="tailleForPaniers" id="seletedTailleHere'+el["Code_produit"]+'" onchange="onPizzaTailleChange('+el["Code_produit"]+')"  name="catego">\
									<option value="33 cm">33 cm</option>\
									<option value="40 cm">40 cm</option>\
									<option value="26 cm">Pizza enfant (26 cm)</option>\
								</select>\
							</td>\
							<td style="border:1px solid white;"><input class="qtForPaniers" id="qtForPanier'+el["Code_produit"]+'" onkeyup="onPizzaQtChange('+el["Code_produit"]+')" value="1" type="text"  style="width:100%; height:110px;"></td>\
							<td id="pizzaTaillePrixHere'+el["Code_produit"]+'" style="border:1px solid white;">'+el[prixTaille]+' E</td>\
							<td style="border:1px solid white;"><a href="maPanier.php?id_client='+idCli+'&delPanier='+el["Code_produit"]+'  ">\
							Supprimer\
							</a></td></tr>';

	
						
	})

	$("#appendHere").html(res)
	
}
function onPizzaTailleChange(id){
	
	//pizzaTaillePrixHere
	let selectedTaille = $("#seletedTailleHere"+id).val()
	
	let produit = getProduitInPanier()
	let current = produit.filter(el=>{
		return el.Code_produit == id 
	})
	
	//selectedTaille == "40 cm" ? $("#pizzaTaillePrixHere"+id).html(current[0]["Prix_40"]+"E") : $("#pizzaTaillePrixHere"+id).html(current[0]["Prix_33"]+"E")

	selectedTaille == "40 cm" ? $("#pizzaTaillePrixHere"+id).html(current[0]["Prix_40"]+"E") : (
		selectedTaille == "33 cm" ? $("#pizzaTaillePrixHere"+id).html(current[0]["Prix_33"]+"E") : $("#pizzaTaillePrixHere"+id).html("6E")
	)

	let others = produit.filter(el=>{
		return el.Code_produit != id
	})
	calculTotal()
	
}
function onPizzaQtChange(id){
	calculTotal()
}
function calculTotal(){
	let allQt = $(".qtForPaniers")
	let allTaille = $(".tailleForPaniers")
	let produit = getProduitInPanier()
	let somme = 0
	for(i=0;i<allQt.length;i++){
		
		 let prix = 0
		
	 	if(allTaille[i].value== "40 cm") prix = produit[i]["Prix_40"]
		if(allTaille[i].value== "33 cm") prix = produit[i]["Prix_33"]
		if(allTaille[i].value=="26 cm") prix = 6
		somme += prix * allQt[i].value  
	}
	$("#totalHere").html(somme+" E")
	$("#totalValueHere").val(somme)
}
  </script>
  </body>
</html>

<?php
	}
}

?>