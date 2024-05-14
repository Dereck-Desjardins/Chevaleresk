<?php
include_once "Models/joueurs.php";
$styles = "css/header.css";
$pageTitle = "Chevaleresk";
$money;
$cartItemCount;
$Niveau ;
if(isset($_SESSION['currentPlayer'])){
    $joueur = $_SESSION['currentPlayer'];
    $USER = DB::TrouverJoueurID($joueur->Id);

    $Alias = $USER[0]['alias'];
    $log =  $Alias;
    $money = DB::getSolde($joueur->Id);
    $panier = $joueur -> getPanier();
    $list = $panier->items ;
    $cartItemCount=count($list);
    $Niveau = $USER[0]['niveau'];
   

}
else{
    $log = 'Connexion';
}


$header = <<< HTML
<nav class="navbar">
  <div class="navbar-container container">
      <input type="checkbox" name="" id="">
      <div class="hamburger-lines">
          <span class="line line1"></span>
          <span class="line line2"></span>
          <span class="line line3"></span>
      </div>
      <ul class="menu-items">
          <li><a href="login.php">$log</a></li>
          <li><a href="boutique.php">Boutique</a></li>
          <li><a href="inventaire.php">Inventaire</a></li>
          <li><a href="enigma.php">Enigma</a></li>
          <li><a href="panoramix.php">Panoramix</a></li>
          <li class="quantitéCart" data-quantity="$cartItemCount"><a class="bout-cart" href="panier.php">Panier</a><span class="quantity"></span></li>
HTML;
if(isset($_SESSION['currentPlayer'])){
    $header.= '<li><a>'.$money[0]['solde'] .' écus</a></li>';
}
if(isset($_SESSION['currentPlayer'])){
    if($Niveau == 'herboriste'){
        $header.= '<li><i class="fa-solid fa-leaf" title="Herboriste"></i></li>';
    }
    else if($Niveau == 'debutant'){
        $header.= '<li><i class="fa-solid fa-flask" title="Debutant"></i></li>';
    }
    else if($Niveau == 'intermediaire'){
        $header.= '<li><i class="fa-solid fa-flask" title="Intermediaire"></i></li>';
    }
    else{
        $header.= '<li><i class="fa-solid fa-flask" title="Expert"></i></li>';
    }
}
$header.= <<< HTML
      </ul>
      <h1 class="logo"><a class="logo" href="mainMenu.php">$pageTitle</a></h1>
  </div>
</nav>
HTML;
