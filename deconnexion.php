<?php
session_start(); // Permet d'accéder à nouveau aux variables de session (sécurité)
// $_SESSION = array();
unset($_SESSION['numeroUtilisateur']);
unset($_SESSION['pseudo']);
unset($_SESSION['adresseMail']);
unset($_SESSION['logged']);
// session_destroy();  // Détruit toutes les données associées à la session courante
header("Location: index.php"); // Renvoie vers la page d'accueil où la possibilité de se connecter sera possible
?>
