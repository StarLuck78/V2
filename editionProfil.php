<?php include ("header.php");
session_start();
 
$bdd = new PDO('mysql:host=localhost;dbname=projet', 'rootage', 'root');
 
if(isset($_SESSION['numeroUtilisateur'])) {
   $requser = $bdd->prepare("SELECT * FROM Utilisateur WHERE numeroUtilisateur = ?");
   $requser->execute(array($_SESSION['numeroUtilisateur']));
   $user = $requser->fetch();
   if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $user['pseudo']) {
      $newpseudo = htmlspecialchars($_POST['newpseudo']);
      $insertpseudo = $bdd->prepare("UPDATE Utilisateur SET pseudo = ? WHERE numeroUtilisateur = ?");
      $insertpseudo->execute(array($newpseudo, $_SESSION['numeroUtilisateur']));
      header('Location: profil.php?numeroUtilisateur='.$_SESSION['numeroUtilisateur']);
   }
    if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['adresseMail']) {
        $newmail = htmlspecialchars($_POST['newmail']);
        $insertmail = $bdd->prepare("UPDATE Utilisateur SET adresseMail = ? WHERE numeroUtilisateur = ?");
        $insertmail->execute(array($newmail, $_SESSION['numeroUtilisateur']));
        header('Location: profil.php?numeroUtilisateur='.$_SESSION['numeroUtilisateur']);
    }
        if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
            $mdp1 = sha1($_POST['newmdp1']);
            $mdp2 = sha1($_POST['newmdp2']);
            if($mdp1 == $mdp2) {
                $insertmdp = $bdd->prepare("UPDATE Utilisateur SET motDePasse = ? WHERE numeroUtilisateur = ?");
                $insertmdp->execute(array($mdp1, $_SESSION['numeroUtilisateur']));
                header('Location: profil.php?numeroUtilisateur='.$_SESSION['numeroUtilisateur']);
            } else {
                $msg = "Vos deux mdp ne correspondent pas !";
            }
        }
?>
<html>
   <head>
      <title>TUTO PHP</title>
      <meta charset="utf-8">
   </head>
   <body>
      <div align="center">
         <h2 class="mb-5">Edition de mon profil</h2>
         <div align="left">
            <div align="center">
               <button type="button" class="btn btn-outline-secondary m-2" onclick="window.location.href='editionPseudo.php'">Modifier mon pseudo</a></button><br>
               <button type="button" class="btn btn-outline-secondary m-2" onclick="window.location.href='editionMail.php'">Modifier mon adresse mail</a></button><br>
               <button type="button" class="btn btn-outline-secondary m-2" onclick="window.location.href='editionMDP.php'">Modifier mon  mot de passe</a></button><br><br>
               <button type="button" class="btn btn-outline-secondary m-2" onclick="window.location.href='profil.php'">Retour</a></button>
            </div>

            <?php if(isset($msg)) { echo $msg; } ?>
         </div>
      </div>
   </body>
</html>
<?php   
}
else {
   header("Location: connexion.php");
}

include("footer.php");?>