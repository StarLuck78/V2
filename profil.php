<?php include('header.php');
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=projet', 'rootage', 'root');
 
if(isset($_SESSION['numeroUtilisateur']) AND $_SESSION['numeroUtilisateur'] > 0)  // Vérification que l'id existe et est STRICTEMENT supérieur à 0 (impossible d'être négatif ou nul)
{    
   $getid = intval($_SESSION['numeroUtilisateur']);    // Permet de sécuriser la variable en la convertissant en une valeur égale à un id existant
   $requser = $bdd->prepare('SELECT * FROM Utilisateur WHERE numeroUtilisateur = ?'); // requête
   $requser->execute(array($getid)); // Récupère l'id de l'utilisateur
   $userinfo = $requser->fetch(); // Va chercher les informations du profil de l'utilisateur 
}
else
{
    echo "Impossible de se connecter à la base de données";
}
?>
<div class="container">
    <div class="row">
        <div class="col-4 m-auto">
            <h2 class="mb-5">Profil de <?php echo $userinfo['pseudo']; ?></h2>
            Nom : <?php echo $userinfo['nom']; ?>
            <br />
            Prenom : <?php echo $userinfo['prenom']; ?>
            <br />
            Pseudo : <?php echo $userinfo['pseudo']; ?>
            <br />
            Mail : <?php echo $userinfo['adresseMail']; ?>
            <br />
            Date de naissance : <?php echo $userinfo['dateDeNaissance']; ?>
            <br />
            <?php
            if(isset($_SESSION['numeroUtilisateur']) AND $userinfo['numeroUtilisateur'] == $_SESSION['numeroUtilisateur']) { 
            ?>
            <br />
            <button type="button" class="btn btn-outline-secondary m-2" onclick="window.location.href='editionProfil.php'">Editer mon profil</a></button>
            <button type="button" class="btn btn-outline-secondary m-2" onclick="window.location.href='deconnexion.php'">Se déconnecter</a></button>
            <?php } ?>
            <script src="app.js"></script>
        </div>
    </div>
</div>


<?php require("footer.php"); ?>