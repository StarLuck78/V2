<?php include('header.php');?>

<div class="container">
    <div align="center">
            <h1 style="color:orange;">Pierre Feuille Ciseaux !</h1><br/>
            <?php
            //IA
            $nb_choix = rand(0,2);
            $tab = array("Pierre", "Feuille", "Ciseaux");
            $choix = $tab[$nb_choix];
            //Conditions
            if(isset($_GET['pierre']))
            {
                echo "IA : $choix <b>V.S</b> Vous : Pierre<br />";
                switch($choix)
                {
                case "Feuille":
                    echo '<p style="color:#FF0000;">Perdu !</p>';
                break;
                case "Pierre":
                    echo '<p style="color:#000000;">Egalité !</p>';
                break;
                case "Ciseaux":
                    echo '<p style="color:#008000;">Gagné !</p>';
                break;
                }
            }
            if(isset($_GET['feuille'])){
            echo "IA : $choix <b>V.S</b> Vous : Feuille<br />";
                switch($choix)
                {
                case "Feuille":
                    echo '<p style="color:#000000;">Egalité !</p>';
                break;
                case "Pierre":
                    echo '<p style="color:#008000;">Gagné !</p>';
                break;
                case "Ciseaux":
                    echo '<p style="color:#FF0000;">Perdu !</p>';
                break;
                }
            }
            if(isset($_GET['ciseaux'])){
            echo "IA : $choix <b>V.S</b> Vous : Ciseaux<br />";
                switch($choix)
                {
                case "Feuille":
                    echo '<p style="color:#008000;">Gagné !</p>';
                break;
                case "Pierre":
                    echo '<p style="color:#FF0000;">Perdu !</p>';
                break;
                case "Ciseaux":
                    echo '<p style="color:#000000;">Egalité !</p>';
                break;
                }
            }
            ?>
            <form method="get" action="pfc.php">
            <br/><br/>
                <button type="submit" name="pierre" class="btn btn-outline-secondary m-2">Pierre</a></button>
                <button type="submit" name="feuille" class="btn btn-outline-secondary m-2">Feuille</a></button>
                <button type="submit" name="ciseaux" class="btn btn-outline-secondary m-2">Ciseaux</a></button>
            </form>

            <button type="button" class="btn btn-outline-secondary m-2" onclick="window.location.href='index.php'">Retour</a></button>
        </div>
</div>
      