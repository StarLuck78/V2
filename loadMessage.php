<?php
$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8;', 'rootage', 'root');
$recupMessage = $bdd->query('SELECT * FROM Messages');
?>
<div class="container">
    <div class="row">
        <div class="col-5 m-auto">
        <div class="overflow-auto border border-dark" style="max-width: 500px; max-height: 300px">
            <?php
                while ($message = $recupMessage->fetch()){
            ?>
            <div class="container">
                <label class="fw-bold"><?= $message['pseudo'];?>&nbsp&nbsp</label>
                <label ><?= $message['date']; ?></label><br>
                <label class="text-break"><?= $message['message']; ?></label><br>
                <label>____________________________________________________________________</label><br>
        </div>

        <?php
        }
    ?>
    </div>
        </div>
    </div>
    
</div>
