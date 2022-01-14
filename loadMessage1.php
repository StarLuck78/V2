<?php
$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8;', 'rootage', 'root');
$recupMessage = $bdd->query('SELECT * FROM Messages');
?>

<div>
    <?php
    while ($message = $recupMessage->fetch()){
        ?>
            <div class="tchat">
                <label class="pseudoTchat"><?= $message['pseudo'];?>&nbsp&nbsp</label>
                <label class="dateTchat"><?= $message['date']; ?></label><br>
            </div>
            <div class="tchat">
                <label class="messageTchat"><?= $message['message']; ?></label><br>
                <label>____________________________________________________________</label><br>
            </div>
        <?php
        }
    ?>
</div>
