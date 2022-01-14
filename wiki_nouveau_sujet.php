<?php include('header.php');
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
  $base = new PDO('mysql:host=localhost;dbname=projet;charset=utf8;', 'rootage', 'root');
  $categories = $base->query('SELECT * FROM Categorie ORDER BY titreCategorie');
  $sujets = $base->prepare('SELECT * FROM Sujet WHERE numeroCategorie = ? ORDER BY titreSujet');

    if(isset($_POST['asubmit'])){

      if(isset($_POST['asujet'],$_POST['amessage'])){



          $sujet = htmlspecialchars($_POST['asujet']);
          $message = ($_POST['amessage']);
          $categorie = htmlspecialchars($_POST['acategorie']);
          $id_utilisateur = $_SESSION['numeroUtilisateur'];


          if(!empty($sujet) AND !empty($message) AND !empty($categorie)){
            if(strlen($sujet)<= 70){

              $sujetrequest = $base->prepare("SELECT * FROM Sujet WHERE titreSujet=?");
              $sujetrequest->execute([$sujet]);
              $sujetexist = $sujetrequest->fetch();

              if($sujetexist){
                $a_error= "Ce sujet existe déjà";
              }
              else{
                $instruction = $base->prepare("INSERT INTO Sujet (numeroUtilisateur, titreSujet, contenuSujet, urlPageSujet , dateDeCreation, numeroCategorie) VALUES (?, ?, ?, concat(REPLACE(LOWER(?),' ',''),'.php'), NOW(), (SELECT numeroCategorie FROM Categorie WHERE Categorie.titreCategorie=?))");
                $instruction->execute(array($id_utilisateur,$sujet,$message,$sujet, $categorie));

                $recupNouvellePage = $base->prepare("SELECT urlPageSujet FROM Sujet WHERE titreSujet=?");
                $recupNouvellePage->execute(array($sujet));
                $recupNew = $recupNouvellePage->fetch();

                $nomPage = $recupNew[0];
                //fopen($nomPage, 'c');
                // fwrite($nomPage,"Enzo pisse dans mon tacos");
                // fclose($nomPage);
                $mon_fichier=fopen($nomPage,"w+");
                if (!$mon_fichier){
                  echo "$nomPage";
                }
                //ecrire :
                fwrite($mon_fichier,"<?php include('header.php');?>
                                          <font color ='0F4FF3' size='7'><?php echo '$categorie'; ?>, </br></font>
                                          <font color ='0F4FF3' size='5'><?php echo '$sujet'; ?> :</font>
                                          <a><?php echo '$message'; ?></a>
                                          <p>Si vous souhaitez consulter le <a href='wiki.php'>wiki</a> cliquez sur le mot !</p>
                                          <?php require('footer.php'); ?>");
                //fermeture
                fclose($mon_fichier);
              }
            }
            else {
              $a_error= "Votre sujet est trop long";
            }
            }
          else{
            $a_error="Veuillez compléter tous les champs";
            }

      }
    }
  /*
  else {
    $a_error= "Vous devez vous connecter pour créer un sujet";
  }*/
  ?>
  <div class="container">
    <div class="row">
      <div class="col-5 m-auto">
          <form method="post" >
            <h3 class="text-center mb-3">Nouveau Sujet</h3>
            <label class="mb-2">Sujet :</label>
            <input type="text" name ="asujet" size="50" maxlength="50" /></input>
            <label class="mb-2">Catégories : </label>
            <select name="acategorie">
              <?php while ($c = $categories->fetch()) {
                $sujets->execute(array($c['numeroCategorie']))
                ?>
                <option><?= $c['titreCategorie'] ?></option>
              <?php } ?>
            </select><br>
            <label>Message :</label><br>
                      <!--<textarea name = "amessage" rows="20" cols="150"></textarea>-->
            <textarea name="amessage"></textarea>
            <script src="ckeditor/ckeditor.js"></script>
            <script>CKEDITOR.replace('amessage');</script><br>
            <div class="container text-center">
              <input type="submit" name = "asubmit" value = "Je créée" class="mb-3">
              <?php if(isset($a_error)){ ?>
              <?= $a_error ?>
              <?php } ?><br>
              <label>Si vous souhaitez consulter le <a href="wiki.php">wiki</a> cliquez sur le mot !</label>
            </div>


          </form>
      </div>
    </div>
  </div>
<?php } ?>

<?php require("footer.php"); ?>
