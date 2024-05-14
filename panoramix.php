<?php
include_once "Models/joueurs.php";
include_once 'Models/items.php';
include_once 'MySql/db_connection.php';
include_once 'php/sessionManager.php';

$ImageFolder = "data/img/";

$connecter = isset($_SESSION['currentPlayer']);
$detailItemId = 0;
if(isset($_GET['ItemId'])){
    $detailItemId = $_GET['ItemId'];
}
if(isset($_SESSION['currentPlayer'])){
    if($_SESSION['currentPlayer']->Niveau != 'herboriste'){
    $content = '<div class="content">';
    if(isset($_GET['message'])){
        if($_GET['message'] == 1){
        $detailItemId = $_GET['ItemId'];
        $potionReussie =  DB::FindDetailsItem($detailItemId);
        if($_SESSION['currentPlayer']->Experience == 6 or $_SESSION['currentPlayer']->Experience == 9){
            $content.='<div class="panoramixMenu">En confectionnant la '. $potionReussie[0]->nom .', vous montez votre niveau alchimiste a '. $_SESSION['currentPlayer']->Niveau.'!</div>';
    
        }
        else{
            $content.='<div class="panoramixMenu">Vous avez confectionner une '. $potionReussie[0]->nom .'!</div>';
        }        }
        elseif($_GET['message'] == 2){
            $potionReussie =  DB::FindDetailsItem($detailItemId);
            $content.='<div class="panoramixMenu texteRouge">Vous ne possedez pas les ingredients necessaire pour concocter la '. $potionReussie[0]->nom .'</div>';
        }
    }
    
    $content.='<div class="panoramixContainer"><div class="allRecette">';
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
                            <a href="panoramix.php?ItemId=$potionId">
                                <img src="$ImageFolder$potionPhoto" alt="" class="imgResultat">
                            </a>
                        </div>
                    
                </div>
            </div>
        HTML;
    }
    $content.='</div><div class="detailRecette">';
    if($detailItemId == 0){
        $content.= <<<HTML
        <div class="explicationTitre">
            Bienvenue Dans Panoramix!
        </div>
        <div class="explication">
            Appuyez sur la potion que vous souhaitez concocter afin de voir ses details et permettre sa création!
        </div>
        
        HTML;
    }
    else{
        $potionActuelle =  DB::FindDetailsItem($detailItemId);
        $nomPotion = $potionActuelle[0]->nom; 
        $imagePotion = $potionActuelle[0]->photo;
        $duree = $potionActuelle[0]->duree;
        $effet = $potionActuelle[0]->effet;
        $type = $potionActuelle[0]->typePotion;
        if($type == "A"){
            $type = "Attaque";
        }
        elseif($type == "D"){
            $type = "Défense";
        }
        $content.= <<<HTML
                <div class="recetteNomGrand">$nomPotion</div>
                <div class="imageRecetteGrand">
                    <img src="$ImageFolder$imagePotion" alt="" class="imgResultatGrand">
                </div>
                <div class="detailPotion">
                    <div class="detailSection">
                        <div class="detailTitre">Durée: </div>
                        <div class="detail">$duree Minutes</div>
                    </div>
                    <div class="detailSection">
                        <div class="detailTitre">Type: </div>
                        <div class="detail">$type</div>
                    </div>
                    <div class="detailSection">
                        <div class="detailTitre">Effet: </div>
                        <div class="detail">$effet</div>
                    </div>
                </div>
                <div class="btnCraft">
                    <input type="button" class="grandBtn" value="Concocter" onclick="concocter($detailItemId)">
                </div>
        HTML;
    
    }
    
    
    $content .= '</div></div></div>';
}
else{
    $content = <<<HTML
        <div class="panoramixMenu texteRouge">Vous n'etes pas encore alchimiste! Allez dans enigma et répondez à des questions sur les éléments et les potions pour le devenir'</div>


    HTML;
}
}
else{
    header('Location: login.php?message=4');
}




include "views/master.php";

?>
<script>
    function concocter(idPotion) {
    console.log("allo");
    window.location.href = "concocter.php?idPotion="+idPotion;
    }
</script>