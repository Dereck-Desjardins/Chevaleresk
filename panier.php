<?php
include_once "Models/joueurs.php";
include_once 'Models/items.php';
include_once 'php/sessionManager.php';
include_once 'MySql/db_connection.php';


$category = isset($_GET['category']) ? $_GET['category'] : null;

if (!isset($_SESSION['currentPlayer'])) {
    header('Location: login.php?message=1');
} else {
    $ImageFolder = "data/img/";

            $content = '<div class="content"><div class="itemContainer">';
            $totalPrice = 0;
            if(count($_SESSION["currentPlayer"]->Panier->items) == 0){
                $content.= <<<HTML
            <div class="panierVide">Votre panier est actuellement vide</div>
            HTML;
        }
        else{
            
            foreach ($_SESSION["currentPlayer"]->Panier->items as $itemId => $quantity) {
                $oneItem = DB::getItemById($itemId);
                
                
        if ($oneItem) {
            $id = $oneItem->idItem;
            $nom = $oneItem->nom;
            $quantite = $oneItem->quantiteStock;
            $typeItem = $oneItem->typeItem;
            $prix = $oneItem->prix;
            $photo = $oneItem->photo;

            if ($category === null || $typeItem === $category) {
                switch ($typeItem) {
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

            $subtotal = $prix * $quantity;

            $totalPrice += $subtotal;

            $inputId = "quantite_$id";
        $actionBarHtml = <<<HTML
            <div class="sectionDroite">

                <div class="total">Total: $totalPrice</div>
                
                <button class="bouton" onclick="handleBuyCart()">Payer</button>
                
                <button class="bouton" onclick="handleEmptyCart()">Vider le panier</button>
            
            </div>
            HTML;
            $ItemHTML = <<<HTML
        <div class="itemLayout">
            <a href="detailItem.php?id=$id&lastPage=3" class="shopItemLeft">
                <img src="$ImageFolder$photo" alt="" class="photoItemShop">
            </a>
            <div class="shopItemMiddle">
                <div class="nomItem">$nom</div>
                <div class="typeItem">$typeItem</div>
            </div>
            <div class="shopItemRight">
                <div class="prix">Prix unitaire: $prix</div>
                <div class="quantite">Quantité:</div>
                <input type="number" id="$inputId" name="$inputId" min="1"  max="$quantite" value="$quantity" class="quantite" onclick="handleQuantityChange(this.value ,$id)" onkeydown="return false;">
                <div class="subtotal">Sous-total: $subtotal</div>
                <input type="button" value="Enlever" class="bouton" onclick="Remove($id)">
            </div>
        </div>
        HTML;
            
            $content .= $actionBarHtml;
            $content .= $ItemHTML;
        }
    }
}
    $content .= '</div></div>';
}
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
    function Remove(itemId) {
        window.location.href = "removeItem.php?id=" + itemId;
    }
    function handleBuyCart() {
        window.location.href = "buyCart.php";
    }
</script>