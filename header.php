<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Forum de discussion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Accueil</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Questions & réponses
                </a>

                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Test 1</a></li>
                    <li><a class="dropdown-item" href="#">Test 2</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="wiki.php">Wiki</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="discussion.php">Discussion</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
                    Articles
                </a>

                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="histoire1.php">Un casino piraté</a></li>
                    <li><a class="dropdown-item" href="histoire2.php">La Porsche gratuite</a></li>
                    <li><a class="dropdown-item" href="histoire3.php">Piratage de la NASA</a></li>
                </ul>
            </li>
        </ul>
        <?php if (!isset($_SESSION['logged'])){ ?>
            <button type="button" class="btn btn-outline-secondary m-2" onclick="window.location.href='inscription.php'">S'inscrire</a></button>
            <button type="button" class="btn btn-outline-secondary m-2"onclick="window.location.href='connexion.php'">Se connecter</a></button>
        <?php } 
        else { ?>
            <button type="button" class="btn btn-outline-secondary m-2" onclick="window.location.href='profil.php'">Mon compte</a></button>
            <button type="button" class="btn btn-outline-secondary m-2" onclick="window.location.href='deconnexion.php'">Se déconnecter</a></button>
        <?php } ?>


        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Rechercher</button>
        </form>

        </div>
    </div>
    </nav>

<h1 class="display-4 text-center mb-5" type="button" onclick="window.location.href='index.php'">Forum de discussion</h1>

<body class="d-flex flex-column min-vh-100 bg-light">