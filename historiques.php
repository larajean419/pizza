<?php
    session_start();
    include('../base/base.php');

    $id = $_GET["id_client"];

    $reqUser = $bdd->prepare("SELECT * FROM client where id_client = ? ");	

	$reqUser->execute(array($id));

    $userInfo = $reqUser->fetch();
    
    
  
     $reqHistorique  = $bdd->prepare("SELECT * FROM facture where Email_client = ? order by Date_du_commande desc limit 10 ");

    $emailPres = $userInfo["Email"];
   $reqHistorique->execute(array($emailPres));

   $factureClient = $reqHistorique->fetchAll(); 

?>



<div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                 Historique <?= $sundayThisweek = date("Y-m-d", strtotime('sunday  this week')) ?>
                </h3>

                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <ul class="todo-list" data-widget="todo-list">
                <?php 
                      foreach($factureClient as $facture) {
                        
                 ?>

                  <li>
                    <!-- drag handle -->
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <!-- checkbox -->
                    <div  class="icheck-primary d-inline ml-2">
                      <input type="checkbox" id="<?= $facture["Code_facture"] ?>"  name="todo1" class="idFactForRepasse">
                      <input type="hidden"  />
                      <label for="todoCheck1"></label>
                    </div>

                   
                    <!-- todo text -->
                    <span class="text"><?= $facture["Nom_menu_commnder"]." ". $facture["Categories_menu_commnder"] ?></span>
                    <!-- Emphasis label -->
                    <small class="badge badge-danger"><i class="far fa-clock"></i> <?= $facture["Date_du_commande"] ?></small>
                    <!-- General tools such as edit or delete-->
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                      <?php } ?>
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
              <select  id="typeCmdPanier2" required >
                                            <option value="">Type de commande </option>
                                            <option value="Sur place">Sur place</option>
                                            <option value="A emporter">A emporter</option>
                </select>
                Quantité<input type="text" placeholder=" Ex : 1,2,3" id="qtForRepasser" />
                <button onclick="send()" type="button" class="btn btn-info float-right"><i class="fas fa-plus"></i>Repasser commande</button>
              </div>
            </div>

            <script src="js/jquery.min.js"></script>
            <script>
           

           function send(){
            let qtArr = $("#qtForRepasser").val()
            let qt = qtArr.split(",")
            let idfacuture = []
            const now = new Date()
	      	let ref= Math.round(now.getTime() / 1000)
           $(".idFactForRepasse").each(function(){
               if($(this)[0].checked == true){
                idfacuture.push(parseInt($(this)[0].id))
               }
               
           })
           $.ajax({
               method: "post",
               url: "repasserCmd.php",
               data: {
                 ref : ref,
                   facture : idfacuture,
                   typeCmd : $("#typeCmdPanier2").val(),
                   qt  :qt
               },
               
               success: function (response) {
                window.location.reload()
               }
           });
           }
            </script>