<?php
$content = '<div class="content"><div class="itemContainer">';
//ajouter les informations du panier + une fontion pour acheter le panier

foreach($allItems as $oneItem){
    $id = $oneItem->Id;
    $nom = $oneItem->Nom;
    $quantite = $oneItem->QuantiteStock; 
    $typeItem = $oneItem->TypeItem;
    $prix = $oneItem->Prix;
    $photo = $oneItem->Photo;

    if($quantite > 0){
      $ItemHTML = <<<HTML
        <div class="itemLayout">
            <div class="shopItemLeft">
                <img src="$photo" alt="" class="photoItemShop">
            </div>
        
            <div class="shopItemMiddle">
                <div class="nomItem">$nom</div>
                <div class="typeItem">$typeItem</div>
            </div>
            <div class="shopItemRight">
                <div class="prix">Prix unitaire: $prix </div>
                <form action="">
                    <input type="number" id="quantite" name="quantite" min="1" value="1" class="quantite">
                    <input type="submit" value="Ajouter au panier" class="bouton">
                </form>
            </div>

        </div>
      HTML;
    }

}           

    $content = $content + '</div></div>';
    include "views/master.php";
?>