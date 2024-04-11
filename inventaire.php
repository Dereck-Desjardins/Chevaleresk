<?php
    include_once "Models/joueurs.php";
    include_once 'Models/items.php';
    include_once 'php/sessionManager.php';
    include_once 'MySql/db_connection.php';


if (!isset($_SESSION['currentPlayer'])) {

    header('Location: login.php?message=2');
}
else{
        $currentId = $_SESSION['currentPlayer']->Id;
        $allItemsInv = DB::GetInventaire($currentId);
        $ImageFolder = "data/img/";


        $content = <<<HTML
        <div class="title">Inventaire</div>
        <div class="contentInventaire">
            <div class="menuInventaire">
                <div class="menuTop">
                    <div class="select-container">
                        <select name="dropdown" id="dropdown">
                            <option value="" disabled selected hidden>Filtre</option>
                            <option value="option1">Quantité</option>
                            <option value="option2">Type</option>
                            <option value="option3">Prix plus petit au plus grand</option>
                            <option value="option4">Prix plus grand au plus petit</option>
                        </select>
                    </div>            
                    
                    <div class="input-container">
                        <input placeholder="Search.." id="input" class="input" name="text" type="text">
                    </div>                
                </div>
                <!-- <div class="menuBottom">
                    <div>
                        <a href=""><input class="formControl button-SignIn, button" type="button" value="Equipement" /></a>
                    </div>
                    <div>
                        <a href=""><input class="formControl button-SignIn, button" type="button" value="Ingrédients" /></a>
                    </div>
                </div> -->
                
            </div>
            <div class="inventaireContainer">
                
        HTML;
        if (count($allItemsInv) == 0) {
            $content .= <<<HTML
                <div class="panierVide">Votre inventaire est actuellement vide</div>
            HTML;
        } else {
        foreach($allItemsInv as $oneItemInv){
        $id = $oneItemInv["dItem"];
        $oneItem = DB::getItemById($id);
        $quantite = $oneItemInv["quantiteInventaire"];
        $nom = $oneItem->nom; 
        $photo = $oneItem->photo;

        if($quantite > 0){
        $inputId = "quantite_$id";
        $ItemHTML = <<<HTML
            <div class="itemInventaire">
                <div class="nomInventaire">$nom</div>
                <a href="detailItem.php?id=$id&lastPage=2" class="photoInventaire">
                    <img src="$ImageFolder$photo" alt="" class="photoItemShop">
                </a>
                <div class="quantiteInventaire">X$quantite</div>
                <input type="button" value="Vendre" class="btnVendre" onclick="sell($id)">
                <input onkeydown="return false;" type="number" id="$inputId" name="$inputId" min="1" value="1" class="qttVendre">
            </div>
        HTML;

        $content .= $ItemHTML;
        }
    }           

    $content .= '</div></div></div>';
        }
}
include "views/master.php";