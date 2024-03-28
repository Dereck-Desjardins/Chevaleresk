<?php
include_once "Models/joueurs.php";
include_once 'Models/items.php';
include_once 'php/sessionManager.php';
include_once 'MySql/db_connection.php';


if (!isset($_SESSION['currentPlayer'])) {

    header('Location: login.php?message=1');
}
else{
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
                <div class="quantite">Quantité: <input type="number" id="$inputId" name="$inputId" min="1" value="$quantity" class="quantite" onclick="handleQuantityChange(this.value ,$id)"></div>
                <div class="subtotal">Sous-total: $subtotal</div>
            </div>
        </div>
        HTML;

        $content .= $ItemHTML;
    }
}
$actionBarHtml = <<<HTML
    <div class="total">Total: $totalPrice</div>

    <button class="bouton" onclick="handleBuyCart()">Payer</button>

    <button class="bouton" onclick="handleEmptyCart()">Vider le panier</button>
HTML;
$content .= $actionBarHtml;
$content .= '</div></div>';
}
include "views/master.php";
?>
<script>
    function handleQuantityChange(newQuantity, itemId) {
        window.location.href = "updateQuantity.php?itemId=" + itemId + "&newQuantity=" + newQuantity;
    }
    function handleEmptyCart() {
        window.location.href = "emptyCart.php";
    }
    function handleBuyCart() {
        window.location.href = "buyCart.php";
    }
</script>



