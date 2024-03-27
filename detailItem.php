<?php
    include 'php/sessionManager.php';
    include 'php/formUtilities.php';
    include 'MySql/db_connection.php';
    // fonction qui va chercher l<item via id
    $idItem = $_GET['id'];
    $Item = DB::FindDetailsItem($idItem);
    $nom = $Item[0]->nom;
    $quantite = $Item[0]->quantiteStock; 
    $typeItem = $Item[0]->typeItem;
    $prix = $Item[0]->prix;
    $photo = $Item[0]->photo;

    $ImageFolder = "data/img/".$photo;

    if($typeItem == "R"){
        $taille = $Item[0]->taille;
        $matiere = $Item[0]->matiere;
    }
    if($typeItem == "A"){
        $description = $Item[0]->description;
        $efficacite = $Item[0]->efficacite;
        $genre = $Item[0]->genre;
    }
    if($typeItem == "P"){
        $duree = $Item[0]->duree;
        $effet = $Item[0]->effet;
        $typePotion =$Item[0]->typePotion;
    }
    if($typeItem == "E"){
        $rarete = $Item[0]->rarete;
        $dangerosite = $Item[0]->dangerosite;
    }
    
    
    
    $content = <<<HTML
    <div class="content">
        <div class="content2">
        <div class="photoItem">
            <img src="$ImageFolder" alt="" class="photo">
        </div>
        <div class="name">$nom</div>
            <div class="description">
                <div class="prix">Prix Unitaire: $prix</div>
    HTML;
    
    if($typeItem == "R"){
        //Taille et matiere
        $content .= <<<HTML
            <div class="caracteristique">Taille: $taille</div>
            <div class="caracteristique">Matiere: $matiere</div>
        HTML;
    }
    if($typeItem == "A"){
        //Description, efficacite, genre
        $content .= <<<HTML
            <div class="caracteristique">Description: $description</div>
            <div class="caracteristique">Efficacite: $efficacite</div>
            <div class="caracteristique">Genre: $genre</div>
        HTML;        
    }
    if($typeItem == "P"){
        //Duree, Effet, Typepotion
        $content .= <<<HTML
            <div class="caracteristique">Duree: $duree</div>
            <div class="caracteristique">Effet: $effet</div>
            <div class="caracteristique">Type de Potion: $typePotion</div>
        HTML;        
    }
    if($typeItem == "E"){
        //rarete, dangerosite
        $content .= <<<HTML
            <div class="caracteristique">Rarete: $rarete</div>
            <div class="caracteristique">Dangerosite: $dangerosite</div>
        HTML;        
    }

    $content .= <<<HTML
            </div>
            <input type="button" value="Retour" class="bouton" onclick="">
        </div>
    </div>
    HTML;
    include "views/master.php";

