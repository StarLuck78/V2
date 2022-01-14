<?php include('header.php');

$base = new PDO('mysql:host=localhost;dbname=projet;charset=utf8;', 'rootage', 'root');
$categories = $base->query('SELECT * FROM Categorie ORDER BY titreCategorie');

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
    if(isset($_POST['acategorie'])){
      $categorie = htmlspecialchars($_POST['acategorie']);
      if(!empty($categorie)){
        $categorierequest = $base->prepare("DELETE FROM Categorie WHERE titreCategorie=?");
        $categorierequest->execute([$categorie]);
      }
      else {
        $a_error="Sélectionnez une categorie";
      }
    }
    else{
      $a_error="Sélectionnez une categorie";
    }
  }
  ?>

  <div class="container text-center">
    <div class="row">
      <div class="col">
        <form method="post" >
        <h3 class="text-center mb-3">Supprimer une Catégorie</h3>
        <label class="mb-3">Catégories :</label>
        <select name="acategorie">
            <!--<option><input type="text"></option>-->
          <?php while ($c = $categories->fetch()) {
          ?>
            <option><?= $c['titreCategorie'] ?></option>
          <?php } ?>
        </select><br>
        <input type="submit" name = "asubmit" value = "Je supprime" class="mb-3"/><br>
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
