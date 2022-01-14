<?php require("header.php");
session_start();
$base = new PDO('mysql:host=localhost;dbname=projet;charset=utf8;', 'rootage', 'root');

if(isset($_POST['formulaireInscription']))
{
    $lastName = htmlspecialchars($_POST['lastName']);
    $firstName = htmlspecialchars($_POST['firstName']);
    $birthDay = htmlspecialchars($_POST['birthDay']);
    $mailAdress = htmlspecialchars($_POST['mailAdress']);
    $checkMailAdress = htmlspecialchars($_POST['checkMailAdress']);
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $newPassword = sha1($_POST['newPassword']);
    $checkPassword = sha1($_POST['checkPassword']);
    if(filter_var($mailAdress, FILTER_VALIDATE_EMAIL))
         {
            $mailrequest = $base->prepare("SELECT * FROM Utilisateur WHERE adresseMail=?");
            $mailrequest->execute([$mailAdress]); 
            $mailexist = $mailrequest->fetch();
            if($mailexist)  
                {
                    $erreur = "Votre adresse mail est déjà utilisée";
                }
            else 
            {
                $pseudorequest = $base->prepare("SELECT * FROM Utilisateur WHERE pseudo=?");
                $pseudorequest->execute([$pseudo]); 
                $pseudoexist = $pseudorequest->fetch();
                if($pseudoexist)
                    {
                        $erreur = "Votre pseudo est déjà utilisé";
                    }
                else
                    {
                        if($newPassword == $checkPassword)
                            {
                                $insertmbr = "INSERT INTO Utilisateur(nom, prenom, adresseMail, pseudo, dateDeNaissance, motDePasse) 
                                VALUES ('$lastName', '$firstName', '$mailAdress', '$pseudo', '$birthDay', '$newPassword')";
                                $base->query($insertmbr);
                                header('Location: index.php');
                            }
                        else 
                        {
                            $erreur = "Confirmation de mot de passe incorrecte";
                        }
                    }
            }
         }
    else
         {
            $erreur = "Le format de l'adresse mail n'est pas bon";
         }

}

?>

<div align="center">
    <h2>Inscription</h2>
    <br />
    <form method="POST" action="">
        <table>
            <tr>
                <td align="right">    
                    <label for="idLastName">Nom : </label>
                </td>
                <td>
                    <input type="text" placeholder="Votre nom" name="lastName" id="idLastName" value="" required/> <br>
                </td>
            </tr>
            <tr>
                <td align="right">    
                    <label for="idFirstName">Prénom : </label>
                </td>
                <td>
                    <input type="text" placeholder="Votre prénom" name="firstName" id="idFirstName" value="" required/> <br>
                </td>
            </tr>
            <tr>
                <td align="right">    
                    <label for="idBirthday">Date de naissance : </label>
                </td>
                <td>
                    <input type="date" placeholder="Votre date de naissance" name="birthDay" id="idBirthday" value="" required/> <br>
                </td>
            </tr>
            <tr>
                <td align="right">    
                    <label for="idMailAdress">Adresse mail : </label>
                </td>
                <td>
                    <input type="text" placeholder="Votre adresse mail" name="mailAdress" id="idMailAdress" value="" required/> <br>
                </td>
            </tr>
            <tr>
                <td align="right">    
                    <label for="idNewPseudo">Pseudo : </label>
                </td>
                <td>
                    <input type="text" placeholder="Votre pseudo" name="pseudo" id="idNewPseudo" value="" required/> <br>
                </td>
            </tr>
            <tr>
                <td align="right">    
                    <label for="idNewPassword">Mot de passe : </label>
                </td>
                <td>
                    <input type="password" placeholder="Votre mot de passe" name="newPassword" id="idNewPassword" value="" required/> <br>
                </td>
            </tr>
            <tr>
                <td align="right">    
                    <label for="idCheckPassword">Mot de passe : </label>
                </td>
                <td>
                    <input type="password" placeholder="Confirmez votre mot de passe" name="checkPassword" id="idCheckPassword" value="" required/> <br>
                </td>
            </tr>
        </table>
        <br />
        <button type="submit" class="btn btn-dark m-2" name="formulaireInscription">Je m'inscris</button>
        <br /><br />
        <a href="connexion.php" class="ca">Tu as déjà un compte ?</a>      
        </form>
        <br /><br />
        <?php
        if(isset($erreur))
        {
            echo '<font color="red">'.$erreur."</font>"; 
        }
        ?>
<div>
    <h2>Données personnelles</h2>
        <p>En cliquant sur "Je m'inscris", j'atteste avoir plus de 15 ans. Vos données sont collectées afin de créer et gérer votre compte. Vous disposez d'un droit d'accès, rectification, suppression, limitation, portabilité de vos données.</p>
        <p>Pour en savoir plus sur le traitement de vos données personnelles : </p>
    <ul>
        <a href="https://www.youtube.com/c/RABBINDESBOIS">Notre politique de confidentialité</a>
    </ul>
</div>


<?php require("footer.php"); ?>