<?php
include_once "Models/joueurs.php";
include_once 'Models/items.php';
include_once 'MySql/db_connection.php';
include_once 'php/sessionManager.php';

$ImageFolder = "data/img/";

$connecter = isset($_SESSION['currentPlayer']);

$content = '<div class="content">   <div class="panoramixContainer"><div class="panoramixMenu"></div><div class="allRecette">';

$potions = DB::getAllPotions();

foreach ($potions as $potion){
    $potionId = $potion->idItem;
    $potionPhoto = $potion->photo;
    $potionNom = $potion->nom;
    $recettes = DB::getRecetteById($potionId);

    $content .= <<<HTML
        <div class="recetteContainer">
            <div class="recetteLeft">
            <div class="recetteNom">$potionNom</div>

    HTML;

    foreach($recettes as $recette){
        $idElement = $recette->Elements_idItem;
        $quantite = $recette->Quantite;

        $element = DB::getItemById($idElement);
        $elementPhoto = $element->photo;
        $elementNom = $element->nom;
        $recetteLeftHTML = <<<HTML
                        <div class="recetteIngredient ">
                            <div class="espaceImageIngredient">
                                <img src="$ImageFolder$elementPhoto" alt="" class="imgIngredient">
                            </div>
                            <div class="quantiteIngredient">X$quantite</div>
                        </div>
        HTML;
        $content .= $recetteLeftHTML;
    }
    $content .= <<<HTML
            </div>
                <div class="recetteRight">
                    <div class="resultatRecette">
                        <img src="$ImageFolder$potionPhoto" alt="" class="imgResultat">
                    </div>
                
            </div>
        </div>
    HTML;
}



$content .= '</div></div></div>';

include "views/master.php";
