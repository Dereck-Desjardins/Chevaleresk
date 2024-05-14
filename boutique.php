<?php
include 'php/sessionManager.php';
include 'php/formUtilities.php';
$ImageFolder = "data/img/";

$allItems = DB::getAllItems();
$connecter = isset($_SESSION['currentPlayer']);

$category = isset($_GET['category']) ? $_GET['category'] : null;

$content = <<<HTML
<div class="content2">
    <div class="itemContainer2">
HTML;

$categoryHtml = <<<HTML
<nav class="category-nav">
    <form id="categoryForm">
        <ul>
            <li><input type="checkbox" id="checkboxNone" name="category[]" value="" class="category-checkbox" onclick="filterItems()"> <label for="checkboxNone">Aucun</label></li> 
            <li><input type="checkbox" id="checkboxArmes" name="category[]" value="A" class="category-checkbox" onclick="filterItems()"> <label for="checkboxArmes">Armes</label></li>
            <li><input type="checkbox" id="checkboxArmures" name="category[]" value="R" class="category-checkbox" onclick="filterItems()"> <label for="checkboxArmures">Armures</label></li>
            <li><input type="checkbox" id="checkboxPotions" name="category[]" value="P" class="category-checkbox" onclick="filterItems()"> <label for="checkboxPotions">Potions</label></li>
            <li><input type="checkbox" id="checkboxElements" name="category[]" value="E" class="category-checkbox" onclick="filterItems()"> <label for="checkboxElements">Éléments</label></li>
        </ul>
    </form>
</nav>

HTML;

$content .= $categoryHtml;

foreach ($allItems as $oneItem) {
    $id = $oneItem->idItem;
    $nom = $oneItem->nom;
    $quantite = $oneItem->quantiteStock;
    $typeItem = $oneItem->typeItem;
    $prix = $oneItem->prix;
    $photo = $oneItem->photo;

    if ($category === null || in_array($typeItem, $category)) {
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

        if ($quantite > 0) {
            $inputId = "quantite_$id";
            $ItemHTML = <<<HTML
<div class="flip-card">
    <div class="flip-card-inner">
        <div class="flip-card-front">
            <a href="detailItem.php?id=$id&lastPage=1" class="flip-card-link">
                <img src="$ImageFolder$photo" alt="" class="photoItemShop">
            </a>
            <div class="nomItem">$nom</div>
        </div>
        <div class="flip-card-back">
            <a href="detailItem.php?id=$id&lastPage=1" class="flip-card-link">
                <div class="nomItem" style="color:white;" title="Détail">$nom</div>
                <div class="typeItem" style="color:white;" title="Détail">$typeItem</div>
                <div class="typeItem" style="color:white;" title="Détail">Quantité: $quantite</div>
                <div class="prix" style="color:white;" title="Détail">Prix unitaire: $prix Ecus</div>
            </a>
HTML;
            if ($typeItem == 'Element') {
                if (isset($_SESSION['currentPlayer'])) {
                    if ($_SESSION['currentPlayer']->Niveau != 'herboriste') {
                        $ItemHTML .= <<<HTML
                            <input type="number" id="$inputId" name="$inputId" min="1" max="$quantite" value="1" class="quantite" onkeydown="return false;"> 
                            <input type="button" value="Ajouter au panier" class="bouton" onclick="addToBasket($id, $connecter)">
                        HTML;
                    } else {
                        $ItemHTML .= <<<HTML
                            <div class="txtNonAlchimiste">Vous n'avez pas le niveau nécessaire pour acheter cet élément.</div>
                        HTML;
                    }
                }
            } else {
                $ItemHTML .= <<<HTML
                    <input type="number" id="$inputId" name="$inputId" min="1" max="$quantite" value="1" class="quantite" onkeydown="return false;"> 
                    <input type="button" value="Ajouter au panier" class="bouton" onclick="addToBasket($id,$connecter)">
                HTML;
            }

            $ItemHTML .= <<<HTML
        </div> <!-- fermeture div.flip-card-back -->
    </div> <!-- fermeture div.flip-card-inner -->
</div> <!-- fermeture div.flip-card -->
HTML;

            $content .= $ItemHTML;
        }
    }
}

$content .= <<<HTML
    </div>
</div>
HTML;

include "views/master.php";
?>

<script>
    ("[type='number']").keypress(function (evt) {
        evt.preventDefault();
    });

    function addToBasket(itemId, connecter) {
        if (connecter) {
            var quantityInput = document.getElementById("quantite_" + itemId);
            var quantity = quantityInput.value;
            window.location.href = "addToBasket.php?itemId=" + itemId + "&quantity=" + quantity;
        } else {
            window.location.href = 'login.php?message=3';
        }
    }

    function filterItems() {
    var form = document.getElementById("categoryForm");
    var checkboxes = form.elements["category[]"];
    var selectedCategories = [];
    var aucunCheckbox = null; // Pour stocker la case à cocher "Aucun"

    // Parcourir les cases à cocher et récupérer les catégories sélectionnées
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            if (checkboxes[i].value === "") {
                // Si "Aucun" est sélectionné, désélectionner les autres catégories et les désactiver
                aucunCheckbox = checkboxes[i];
                for(var j = 0; j < checkboxes.length; j++){
                    if(checkboxes[j] !== aucunCheckbox){
                        checkboxes[j].checked = false;
                    }
                }
            } else {
                selectedCategories.push(checkboxes[i].value);
                // Réactiver les autres cases si elles étaient désactivées
                checkboxes[i].disabled = false;
            }
        }
    }
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            if (checkboxes[i].value === "") {
                // Si "Aucun" est sélectionné, désélectionner les autres catégories et les désactiver
                aucunCheckbox !== checkboxes[i];
                for(var j = 0; j < checkboxes.length; j++){
                    if(checkboxes[j] == aucunCheckbox){
                        checkboxes[j].checked = false;
                    }
                }
            } else {
                selectedCategories.push(checkboxes[i].value);
                // Réactiver les autres cases si elles étaient désactivées
                checkboxes[i].disabled = false;
            }
        }
    }

    // Si "Aucun" n'est pas sélectionné, activer toutes les cases
    if (aucunCheckbox === null || !aucunCheckbox.checked) {
        for (var k = 0; k < checkboxes.length; k++) {
            checkboxes[k].disabled = false;
        }
    }

    // Appliquer les filtres aux éléments
    var items = document.getElementsByClassName("flip-card");

    for (var l = 0; l < items.length; l++) {
        var item = items[l];
        var itemType = item.getElementsByClassName("typeItem")[0].textContent;


        // Si "Aucun" est sélectionné, afficher tous les éléments
        if (aucunCheckbox !== null && aucunCheckbox.checked) {
            item.style.display = "";
        } else {
            // Sinon, afficher seulement les éléments correspondant aux catégories sélectionnées
            if (selectedCategories.length === 0 || selectedCategories.includes(itemType.charAt(0))) {
                item.style.display = "";
                console.log('ssss')
            } else {
                item.style.display = "none";
                console.log('wwwww')
            }
        }
    }
}

</script>
