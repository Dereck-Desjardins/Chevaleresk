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
      $inputId = "quantite_$id";
      $ItemHTML = <<<HTML
        <div class="itemLayout">
            <div class="shopItemLeft">
                <a href="detailItem.php?id=$id">
                    <img src="$ImageFolder$photo" alt="" class="photoItemShop">
                </a>    
            </div>
        
            <div class="shopItemMiddle">
                <div class="nomItem">$nom</div>
                <div class="typeItem">$typeItem</div>
            </div>
            <div class="shopItemRight">
                <div class="prix">Prix unitaire: $prix </div>
                <input type="number" id="$inputId" name="$inputId" min="1" value="1" class="quantite">
                <input type="button" value="Ajouter au panier" class="bouton" onclick="addToBasket($id)">
            </div>

        </div>
      HTML;

      $content .= $ItemHTML;
    }
}           

$content .= '</div></div>';

include "views/master.php";
?>
<script>
    function addToBasket(itemId) {
    var quantityInput = document.getElementById("quantite_" + itemId);
    var quantity = quantityInput.value;
    window.location.href = "addToBasket.php?itemId=" + itemId + "&quantity=" + quantity;
}
</script>
