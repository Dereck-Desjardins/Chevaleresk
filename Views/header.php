<?php
    $styles = "css/header.css";
    $pageTitle = "Chevaleresk";
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
              <li><a href="login.php">Profil</a></li>
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
