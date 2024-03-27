<?php
include_once "Models/joueurs.php";
include_once 'Models/items.php';
include_once 'php/sessionManager.php';
include_once 'MySql/db_connection.php';

$ImageFolder = "data/img/";

$content = '<div class="content"><div class="itemContainer">';
$totalPrice = 0; 

foreach ($_SESSION["currentPlayer"]->Panier->items as $itemId => $quantity) {
    $oneItem = DB::getItemById($itemId);

    if ($oneItem) {
        $id = $oneItem->idItem;
        $nom = $oneItem->nom;
        $quantite = $oneItem->quantiteStock;
        $typeItem = $oneItem->typeItem;
        $prix = $oneItem->prix;
        $photo = $oneItem->photo;

        $subtotal = $prix * $quantity;

        $totalPrice += $subtotal;

        $inputId = "quantite_$id";

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
                <div class="prix">Prix unitaire: $prix</div>
                <div class="quantite">Quantité: <input type="number" id="$inputId" name="$inputId" min="1" value="$quantity" class="quantite" data-item-id="$id"></div>
                <div class="subtotal">Sous-total: $subtotal</div>
            </div>
        </div>
        HTML;

        $content .= $ItemHTML;
    }
}

$content .= '<div class="total">Total: ' . $totalPrice . '</div>';

$content .= '<button class="bouton">Payer</button>';

$content .= '<button class="bouton">Vider le panier</button>';


$content .= '</div></div>';
include "views/master.php";
?>
<script>
    function handleQuantityChange(itemId, newQuantity) {
    }
   var quantityInputs = document.querySelectorAll('.quantite');
    quantityInputs.forEach(function(input) {
        input.addEventListener('change', function() {
            var itemId = this.getAttribute('data-item-id');
            var newQuantity = this.value;
            handleQuantityChange(itemId, newQuantity);
        });
    });
</script>



