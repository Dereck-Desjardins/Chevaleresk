<?php
    // fonction qui va chercher l<item via id
    $nom = $Item->Nom;
    $quantite = $Item->QuantiteStock; 
    $typeItem = $Item->TypeItem;
    $prix = $Item->Prix;
    $photo = $Item->Photo;
    
    
    
    $content = <<<HTML
        <div class="content">
        <div class="photoItem">
            <img src="photo.png" alt="" class="photo">
        </div>
        <div class="name">$nom</div>
            <div class="description">
                <div class="prix">Prix Unitaire: $prix</div>
                <div></div>
            </div>
            <a href="" class="retour">Retour</a>
        </div>
    HTML;
    include "views/master.php";
?>