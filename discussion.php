<?php require('header.php');
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
    $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8;', 'rootage', 'root');
    if(isset($_POST['valider'])){
        if(!empty($_POST['message'])){
            $message = nl2br(htmlspecialchars($_POST['message']));
            $date = date('d-m-y H:i:s');
    
            $insererMessage = $bdd->prepare('INSERT INTO Messages(pseudo, message, date) VALUES(?,?,?)');
            $insererMessage-> execute(array($_SESSION['pseudo'], $message, $date));
            header( "Location: {$_SERVER['REQUEST_URI']}", true, 303 );
            exit();
        }
        else{ ?>
            <h3 class="text-center">Veuillez compléter tous les champs...</h3>
        <?php }
    }
    ?>

    <form method="POST" action="" align="center">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <h3 class="text-center">Votre message :</h3><br>
        <textarea name="message" cols=50 rows=10></textarea><br>
        <button type="submit" class="btn btn-outline-secondary m-2" name="valider" onclick="load_messages();">Envoyer</a></button>
        <button type="button" class="btn btn-outline-secondary m-2" onclick="load_messages();">Actualiser</a></button>   
    </form>
    <section id="messages"></section>

    <script>
        function load_messages(){
            // event.preventDefault();
            $('#messages').load('loadMessage.php');
        }
    </script>
<!--         <script>
        setInterval('load_messages()', 500);
        function load_messages(){
            $('#messages').load('loadMessage.php');
        } -->
<?php } ?>
<?php require('footer.php'); ?>