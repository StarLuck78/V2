<?php require('header.php');
$base = new PDO('mysql:host=localhost;dbname=projet;charset=utf8;', 'rootage', 'root');


session_start();

if (!isset($_SESSION['logged'])){
  ?>
  <div class="container text-center">
      <div class="row">
          <div class="col">
              <h2 class="mb-5">Connectez-vous pour discuter ici !</h2>
              <button type="button" class="btn btn-outline-secondary"onclick="window.location.href='connexion.php'">Se connecter</a></button>
          </div>
      </div>
  </div>
  <?php
}
else{


  if(isset($_POST['asubmit'])){
    if(isset($_POST['acategorie'])){
      $categorie = htmlspecialchars($_POST['acategorie']);

      if(!empty($categorie)){

        if(strlen($categorie)<= 70){

          $categorierequest = $base->prepare("SELECT * FROM Categorie WHERE titreCategorie=?");
          $categorierequest->execute([$categorie]);
          $categoriexist = $categorierequest->fetch();

          if($categoriexist){
            $a_error = "Cette catégorie existe déjà...";
          }
          else{
            $instruction = $base->prepare("INSERT INTO Categorie (titreCategorie) VALUES (?)");
            $instruction->execute(array($categorie));
          }

        }
        else {
          $a_error= "Votre sujet est trop long";
        }
      }
      else {
        $a_error="Veuillez compléter tous les champs";
      }
    }
  } ?>

  <div class="container">
    <div class="row">
      <div class="col-5 m-auto">
        <form method="post">
          <h3 class="text-center mb-3">Nouvelle catégorie</h3>
          <label class="mb-2">Catégorie :</label>
          <input type="text" name ="acategorie" size="50" maxlength="50" class="mb-3"/><br>
          <div class="container text-center">
            <input type="submit" name = "asubmit" value = "Je crée" class="mb-3"/><br>
            <?php if(isset($a_error)){ ?>
              <?= $a_error ?>
            <?php } ?>
            <label>Maintenant si vous souhaitez créer un nouveau <a href="wiki_nouveau_sujet.php">sujet</a> cliquez sur le mot !</label>
          </div>

        </form>
      </div>
    </div>
  </div>
<?php } ?>



<?php require('footer.php'); ?>
