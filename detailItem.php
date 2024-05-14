<?php
    include 'php/sessionManager.php';
    include 'php/formUtilities.php';
    // fonction qui va chercher l<item via id
    $idItem = $_GET['id'];
    $lastPage = $_GET['lastPage'];
    $Item = DB::FindDetailsItem($idItem);
    $nom = $Item[0]->nom;
    $quantite = $Item[0]->quantiteStock; 
    $typeItem = $Item[0]->typeItem;
    $prix = $Item[0]->prix;
    $photo = $Item[0]->photo;
    $HasCommented = DB::hasPlayerCommentedOnItem($_SESSION['currentPlayer']->getId(),$idItem);


    $ImageFolder = "data/img/".$photo;

    if($typeItem == "R"){
        $taille = $Item[0]->taille;
        $matiere = $Item[0]->matiere;
    }
    elseif($typeItem == "A"){
        $description = $Item[0]->description;
        $efficacite = $Item[0]->efficacite;
        $genre = $Item[0]->genre;
    }
    elseif($typeItem == "P"){
        $duree = $Item[0]->duree." Minutes";
        $effet = $Item[0]->effet;
        $typePotion =$Item[0]->typePotion;
        if($typePotion == "A"){
            $typePotion = "Attaque";
        }
        elseif($typePotion == "D"){
            $typePotion = "Defense";
        }
    }
    elseif($typeItem == "E"){
        $rarete = $Item[0]->rarete;
        $dangerosite = $Item[0]->dangerosite;
        if($rarete == "1"){
            $rarete = "Commun";
        }
        elseif($rarete == "2"){
            $rarete = "Peu Commun";
        }
        elseif($rarete == "3"){
            $rarete = "Rare";
        }
        elseif($rarete == "4"){
            $rarete = "Mythique";
        }

        if($dangerosite == "1"){
            $dangerosite = "Faible";
        }
        elseif($dangerosite == "2"){
            $dangerosite = "Moyenne";
        }
        elseif($dangerosite == "3"){
            $dangerosite = "Elevee";
        }
    }
    
    if($lastPage == 1){
        $returnLink = "boutique.php";
    }
    elseif($lastPage == 2){
        $returnLink = "inventaire.php";
    }
    elseif($lastPage == 3){
        $returnLink = "panier.php";
    }   
    else{
        $returnLink = "mainMenu.php";
    }
    
    $content = <<<HTML
    <div class="content">
        <div class="detailContainer">
        <div class="photoItem">
            <img src="$ImageFolder" alt="" class="photo">
        </div>
        <div class="name">$nom</div>
            <div class="description">
                <div class="caracteristique">
                    <div class="caracteristiqueType">Prix Unitaire: </div>
                    <div class="caracteristiqueValue">$prix Ecus</div>
                </div>  
    HTML;
    
    if($typeItem == "R"){
        //Taille et matiere
        $content .= <<<HTML
            <div class="caracteristique">
                <div class="caracteristiqueType">Taille: </div>
                <div class="caracteristiqueValue">$taille</div>
            </div>  
            <div class="caracteristique">
                <div class="caracteristiqueType">Matière: </div>
                <div class="caracteristiqueValue">$matiere</div>
            </div>   
        HTML;
    }
    if($typeItem == "A"){
        //Description, efficacite, genre
        $content .= <<<HTML
            <div class="caracteristique">
                <div class="caracteristiqueType">Description: </div>
                <div class="caracteristiqueValue">$description</div>
            </div>
            <div class="caracteristique">
                <div class="caracteristiqueType">Efficacité: </div>
                <div class="caracteristiqueValue">$efficacite</div>
            </div>  
            <div class="caracteristique">
                <div class="caracteristiqueType">Genre: </div>
                <div class="caracteristiqueValue">$genre</div>
            </div>           
        HTML;        
    }
    if($typeItem == "P"){
        //Duree, Effet, Typepotion
        $content .= <<<HTML
            <div class="caracteristique">
                <div class="caracteristiqueType">Durée: </div>
                <div class="caracteristiqueValue">$duree</div>
            </div>
            <div class="caracteristique">
                <div class="caracteristiqueType">Effet: </div>
                <div class="caracteristiqueValue">$effet</div>
            </div>  
            <div class="caracteristique">
                <div class="caracteristiqueType">Type de Potion: </div>
                <div class="caracteristiqueValue">$typePotion</div>
            </div>  
        HTML;        
    }
    if($typeItem == "E"){
        //rarete, dangerosite
        $content .= <<<HTML
            <div class="caracteristique">
                <div class="caracteristiqueType">Rareté: </div>
                <div class="caracteristiqueValue">$rarete</div>
            </div>  
            <div class="caracteristique">
                <div class="caracteristiqueType">Dangerosité: </div>
                <div class="caracteristiqueValue">$dangerosite</div>
            </div>   
        HTML;        
    }

    $currentId = $_SESSION['currentPlayer']->Id;
    $allItemsInv = DB::GetInventaire($currentId);
    
    $itemFound = false;
    
    foreach ($allItemsInv as $item) {
        if ($item['dItem'] == $_GET['id']) {
            $itemFound = true;
            break;
        }
    }
    if ($itemFound && $HasCommented != 1) {
        $content .= <<<HTML
        <div class="mt-3 d-flex flex-row align-items-center p-3 form-color">
            <img src="data/img/Image/avatar.jpg" height="50" class="avatar">
            <input type="text" class="form-control" placeholder="Enter your comment...">
        </div>
        <div class="container d-flex justify-content-center">
            <div class="row">
                <div class="col-md-12">
                    <div class="stars">
                        <form action="">
                        
                            <input class="star star-5" id="star-5" type="radio" name="star"/>
                        
                            <label class="star star-5" for="star-5"></label>
                        
                            <input class="star star-4" id="star-4" type="radio" name="star"/>
                        
                            <label class="star star-4" for="star-4"></label>
                        
                            <input class="star star-3" id="star-3" type="radio" name="star"/>
                        
                            <label class="star star-3" for="star-3"></label>
                        
                            <input class="star star-2" id="star-2" type="radio" name="star"/>
                        
                            <label class="star star-2" for="star-2"></label>

                            <input class="star star-1" id="star-1" type="radio" name="star"/>
                        
                            <label class="star star-1" for="star-1"></label>
                        
                        </form>
                    </div>
                    <input type="button" value="Envoyer" id="sendReviewButton" onclick="addRating($idItem)"/>
                </div>
            </div>
        </div>
    HTML;
    }
    $content .= <<<HTML
        <input type="button" value="Voir" onclick="openReviewsWindow($idItem)"/>
        </div>
            <a  class="retour" href='$returnLink'>Retour</a>
        </div>
    </div>
    HTML;
    include "views/master.php";
?>
<script>
    function addRating($idItem) {
        var comment = document.querySelector('.form-control').value;
        
        var selectedStar = document.querySelector('input[name="star"]:checked');
        var stars = selectedStar ? selectedStar.id.split('-')[1] : null;
        
        if(stars !== null && stringNotEmptyOrNull(comment)){
            window.location.href = "addRating.php?idItem=" + $idItem + "&comment=" + comment + "&stars=" + stars;
        }
    };
    function stringNotEmptyOrNull(str) {
    return str !== null && str.trim() !== '';
    }
    function openReviewsWindow($idItem) {
        console.log("allo");
        window.location.href = "reviews.php?id=" + $idItem;
    }
</script>

