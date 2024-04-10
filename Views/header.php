<?php
    include_once "Models/joueurs.php";
    $styles = "css/header.css";
    $pageTitle = "Chevaleresk";
    $money;
    if(isset($_SESSION['currentPlayer'])){
        $joueur = $_SESSION['currentPlayer'];
        $log =  $joueur->Alias;
        $money = $joueur->Solde;
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
              <li><a>$money écus</a></li>
              <li><a href="boutique.php">Boutique</a></li>
              <li><a href="inventaire.php">Inventaire</a></li>
              <li><a href="enigma.php">Enigma</a></li>
              <li><a href="panoramix.php">Panoramix</a></li>
              <li><a href="panier.php">Panier</a></li>
              
          </ul>
          <h1 class="logo">$pageTitle</h1>
      </div>
    </nav>
    HTML;
