<?php require('header.php')?>

<div class="container-fluid ">
    <div class="row ">
        <div class="col-6 m-auto">
            <div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    Bienvenue
                </button>
            </h2>
            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                <div class="accordion-body" type="button" onclick="window.location.href='sePresenter.php'">Se présenter</div>
                <div class="accordion-body" type="button" onclick="window.location.href='annonces.php'">Annonces du forum</div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true" aria-controls="panelsStayOpen-collapseTwo">
                    Jeux du forum
                </button>
            </h2>
            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingTwo">
                <div class="accordion-body" type="button" onclick="window.location.href='pfc.php'">Pierre - Feuille - Ciseaux</div>
                <div class="accordion-body" type="button" onclick="window.location.href='pendu.php'">Le pendu</div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="true" aria-controls="panelsStayOpen-collapseThree">
                    Thématiques généralistes
                </button>
            </h2>
            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingThree">
                <div class="accordion-body" type="button" onclick="window.location.href='menuHistoires.php'">Histoire du hacking</div>
                <div class="accordion-body" type="button">Actualité</div>
                <div class="accordion-body" type="button">Musique</div>
                <div class="accordion-body" type="button">Politique</div>
                <div class="accordion-body" type="button">Jeux vidéos</div>

            </div>
        </div>
        </div>
        
    </div> 
    </div>
    
</div>

<?php require('footer.php')?>