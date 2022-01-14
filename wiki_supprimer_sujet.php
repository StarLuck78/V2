<?php include('header.php');

$base = new PDO('mysql:host=localhost;dbname=projet;charset=utf8;', 'rootage', 'root');
$categories = $base->query('SELECT * FROM Categorie ORDER BY titreCategorie');
$sujets = $base->query('SELECT * FROM Sujet  ORDER BY titreSujet');

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
else {


  if(isset($_POST['asubmit'])){
    if(isset($_POST['asujet'])){
      $sujet = htmlspecialchars($_POST['asujet']);
      if(!empty($sujet)){
        $sujetrequest = $base->prepare("DELETE FROM Sujet WHERE titreSujet=?");
        $sujetrequest->execute([$sujet]);
      }
      else {
        $a_error="Sélectionnez un sujet";
      }
    }
    else{
      $a_error="Sélectionnez un sujet";
    }
  }
  ?>

  <div class="container text-center">
      <div class="row">
          <div class="col-5 m-auto">
              <form method="post" >
              <h3 class="text-center mb-3">Supprimer un Sujet</h3>
              <label class="mb-3">Sujets :</label>
              <select name="asujet">
                  <!--<option><input type="text"></option>-->
                  <?php while ($c = $sujets->fetch()) {
                  ?>
                  <option><?= $c['titreSujet'] ?></option>
                  <?php } ?>
              </select><br>
              <input type="submit" name = "asubmit" value = "Je supprime" class="mb-3"/> <br>
              <?php if(isset($a_error)){ ?>
                  <?= $a_error ?>
              <?php } ?>
              <label>Si vous souhaitez consulter le <a href="wiki.php">wiki</a> cliquez sur le mot !</label>


              </form>
          </div>
      </div>
  </div>

<?php } ?>


<?php include('footer.php'); ?>
