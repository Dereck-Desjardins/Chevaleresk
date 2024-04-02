<?php
include 'php/sessionManager.php';
include 'php/formUtilities.php';
include 'MySql/db_connection.php';

$ImageFolder = "data/img/";

$allItems = DB::getAllItems();

$category = isset($_GET['category']) ? $_GET['category'] : null;

$content = '<div class="content"><div class="itemContainer">';

$categoryHtml = <<<HTML
<nav class="category-nav">
    <ul>
        <li><a href="boutique.php">Aucun</a></li>
        <li><a href="boutique.php?category=A" class="category-link" data-id="Armes">Armes</a></li>
        <li><a href="boutique.php?category=R" class="category-link" data-id="Armures">Armures</a></li>
        <li><a href="boutique.php?category=P" class="category-link" data-id="Potions">Potions</a></li>
        <li><a href="boutique.php?category=E" class="category-link" data-id="Elements">Éléments</a></li>
    </ul>
</nav>
HTML;

$content .= $categoryHtml;

foreach($allItems as $oneItem){
    $id = $oneItem->idItem;
    $nom = $oneItem->nom;
    $quantite = $oneItem->quantiteStock; 
    $typeItem = $oneItem->typeItem;
    $prix = $oneItem->prix;
    $photo = $oneItem->photo;

    if($category === null || $typeItem === $category){
        switch($typeItem) {
            case "R":
                $typeItem = "Armure";
                break;
            case "A":
                $typeItem = "Arme";
                break;
            case "P":
                $typeItem = "Potion";
                break;
            case "E":
                $typeItem = "Element";
                break;
        }

        if($quantite > 0){
          $inputId = "quantite_$id";
          $ItemHTML = <<<HTML
            <div class="itemLayout">
                <div class="shopItemLeft">
                    <a href="detailItem.php?id=$id&lastPage=1">
                        <img src="$ImageFolder$photo" alt="" class="photoItemShop">
                    </a>    
                </div>
            
                <div class="shopItemMiddle">
                    <div class="nomItem">$nom</div>
                    <div class="typeItem">$typeItem</div>
                </div>
                <div class="shopItemRight">
                    <div class="prix">Prix unitaire: $prix Ecus</div>
                    <input type="number" id="$inputId" name="$inputId" min="1" value="1" class="quantite">
                    <input type="button" value="Ajouter au panier" class="bouton" onclick="addToBasket($id)">
                </div>
            </div>
          HTML;

          $content .= $ItemHTML;
        }
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
