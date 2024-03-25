<?php
include 'php/sessionManager.php';
include 'php/formUtilities.php';
include 'MySql/db_connection.php';

$allItems = DB::getAllItems();

$ImageFolder = "data/img/";

$content = '<div class="content"><div class="itemContainer">';
//Ajouter les filtres et tri


foreach($allItems as $oneItem){
    $id = $oneItem->idItem;
    $nom = $oneItem->nom;
    $quantite = $oneItem->quantiteStock; 
    $typeItem = $oneItem->typeItem;
    $prix = $oneItem->prix;
    $photo = $oneItem->photo;

    if($quantite > 0){
      $ItemHTML = <<<HTML
        <div class="itemLayout">
            <div class="shopItemLeft">
                <img src="$ImageFolder$photo" alt="" class="photoItemShop">
            </div>
        
            <div class="shopItemMiddle">
                <div class="nomItem">$nom</div>
                <div class="typeItem">$typeItem</div>
            </div>
            <div class="shopItemRight">
                <div class="prix">Prix unitaire: $prix </div>
                <input type="number" id="quantite" name="quantite" min="1" value="1" class="quantite">
                <input type="button" value="Ajouter au panier" class="bouton" onclick="">
            </div>

        </div>
      HTML;

      $content .= $ItemHTML;
    }
}           

$content .= '</div></div>';

include "views/master.php";
?>
