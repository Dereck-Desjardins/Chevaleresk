<?php
include_once "Models/joueurs.php";
$styles = "css/header.css";
$pageTitle = "Chevaleresk";
$money;
$cartItemCount;
if(isset($_SESSION['currentPlayer'])){
    $joueur = $_SESSION['currentPlayer'];
    $log =  $joueur->Alias;
    $money = DB::getSolde($joueur->Id);
    $panier = $joueur -> getPanier();
    $list = $panier->items ;
    $cartItemCount=count($list);
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
$header.= <<< HTML
      </ul>
      <h1 class="logo"><a class="logo" href="mainMenu.php">$pageTitle</a></h1>
  </div>
</nav>
HTML;
