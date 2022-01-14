<?php
$base = new PDO('mysql:host=localhost;dbname=projet;charset=utf8;', 'rootage', 'root');
$categories = $base->query('SELECT * FROM Categorie ORDER BY titreCategorie');
$sujets = $base->prepare('SELECT * FROM Sujet WHERE numeroCategorie = ? ORDER BY titreSujet');
require('header.php');
?>

<div class="container">
  <div class="row">
    <div class="col-5 m-auto">
      <table>
        <tr>
          <th>Catégories</th>
        </tr>

        <?php while ($c = $categories->fetch()) {
          $sujets->execute(array($c['numeroCategorie']))
          ?>

        <tr>
          <td>
            <h4><?= $c['titreCategorie'] ?></h4>
            <p>
              <?php while($s = $sujets->fetch()){?>
              <a href="<?php echo $s['urlPageSujet']?>"> <?php echo $s['titreSujet']?></a>
              <?php }
              //echo '<a href ="">'.$s['titreSujet'].'</a>'. $s['etat'].'  -  ';
              ?>

            </p>
          </td>
        </tr>
      <?php } ?>

      <tr>
        <td>
          <p>Si vous souhaitez créer un nouveau <a href="wiki_nouveau_sujet.php">sujet</a> cliquez sur le mot !</p>
          <p>Si vous souhaitez créer une nouvelle <a href="wiki_nouvelle_categorie.php">categorie</a> cliquez sur le mot !</p>
          <p>Si vous souhaitez supprimer un <a href="wiki_supprimer_sujet.php">sujet</a> cliquez sur le mot !</p>
          <p>Si vous souhaitez supprimer une <a href="wiki_supprimer_categorie.php">catégorie</a> cliquez sur le mot !</p>
        </td>
      </tr>

      </table>
    </div>
  </div>
</div>


<?php require("footer.php"); ?>