<?php
    // fonction qui va chercher l<item via id
    $Item = 
    $idItem = $Item->Id;
    $nom = $Item->Nom;
    $quantite = $Item->QuantiteStock; 
    $typeItem = $Item->TypeItem;
    $prix = $Item->Prix;
    $photo = $Item->Photo;
    $itemDetail = rechercheItem($idItem, $typeItem);

    if($typeItem == "R"){
        $taille = rechercheItem($idItem, $typeItem);
        $matiere = rechercheItem($idItem, $typeItem);
    }
    if($typeItem == "A"){
        $description =rechercheItem($idItem, $typeItem);
        $efficacite =rechercheItem($idItem, $typeItem);
        $genre =rechercheItem($idItem, $typeItem);
    }
    if($typeItem == "P"){
        $duree = 
        $effet = 
        $typePotion =
    }
    if($typeItem == "E"){
        $rarete = rechercheItem($idItem, $typeItem);
        $dangerosite =rechercheItem($idItem, $typeItem);
    }
    
    
    
    $content = <<<HTML
        <div class="content">
        <div class="photoItem">
            <img src="photo.png" alt="" class="photo">
        </div>
        <div class="name">$nom</div>
            <div class="description">
                <div class="prix">Prix Unitaire: $prix</div>
    HTML;
    
    if($typeItem == "R"){
        //Taille et matiere
        $content = $content + <<<HTML
            <div class="caracteristique"></div>
            <div class="caracteristique"></div>
        HTML;
    }
    if($typeItem == "A"){
        //Description, efficacite, genre
        $content = $content + <<<HTML
            <div></div>
            <div class="caracteristique"></div>
            <div class="caracteristique"></div>
        HTML;        
    }
    if($typeItem == "P"){
        //Duree, Effet, Typepotion
        $content = $content + <<<HTML
            <div class="caracteristique"></div>
            <div class="caracteristique"></div>
            <div class="caracteristique"></div>
        HTML;        
    }
    if($typeItem == "E"){
        //rarete, dangerosite
        $content = $content + <<<HTML
            <div class=""></div>
            <div class=""></div>
        HTML;        
    }

    $content = $content + <<<HTML
            </div>
            <a href="" class="retour">Retour</a>
        </div>
    HTML;
    include "views/master.php";

