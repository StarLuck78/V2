<?php require('header.php');
// session_start();        // Permet de rendre utilisable les variables de session
 
$bdd = new PDO('mysql:host=localhost;dbname=projet', 'rootage', 'root');
 
if(isset($_POST['formconnexion'])) { // Vérification de l'existence de la variable 'formconnexion'
   $mailconnect = htmlspecialchars($_POST['mailconnect']);
   $mdpconnect = sha1($_POST['mdpconnect']);    // Encodage du mot de passe dans la base de données
   if(!empty($mailconnect) AND !empty($mdpconnect)) {   // On vérifie qu'un email ET et un mot de passe existe 
      $requser = $bdd->prepare("SELECT * FROM Utilisateur WHERE adresseMail = ? AND motDePasse = ?");
      $requser->execute(array($mailconnect, $mdpconnect));
      $userexist = $requser->rowCount(); // Fonction qui permet de compter le nombre de rangées dans la base de données qui existe avec le mail et le mot de passe de l'ID
      if($userexist == 1) {     // Si il y a une seule et unique rangée comportant les informations remplies par l'utilisateur lors de la connection dans la base de donnée
        session_start();        // Permet de rendre utilisable les variables de session
         $userinfo = $requser->fetch();     // Permet de collecter les informations de l'utilisateur
         $_SESSION['numeroUtilisateur'] = $userinfo['numeroUtilisateur'];
         $_SESSION['pseudo'] = $userinfo['pseudo'];
         $_SESSION['adresseMail'] = $userinfo['adresseMail'];
         $_SESSION['logged'] = true;
         header("Location: index.php");    //Permet de rediriger vers le profil de la personne
      } else {
         $erreur = "Mail ou mot de passe incorrect !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>

<div align="center">
   <h2>Connexion</h2>
   <br /><br />
   <form method="POST" action="">
      <input type="email" name="mailconnect" placeholder="Mail" />    
      <input type="password" name="mdpconnect" placeholder="Mot de passe" />
      <br /><br />
      <input type="submit" name="formconnexion" value="Se connecter !" />
   </form>
   <?php
   if(isset($erreur)) {
      echo '<font color="red">'.$erreur."</font>";
   } ?>
</div>

<?php require('footer.php'); ?>