<?php
    $styles = "css/header.css";
    $pageTitle = "Chevaleresk";
    $backgroundImagePath = "Image/woodBackground.JPEG";
    $header = <<< HTML
    <div class="menuNavigation">
            <button class="button" data-text="Inventaire">
                <a class="actual-text,itemNavigation"> Inventaire</a>
                <a href="inventaire.php" aria-hidden="true" class="hover-text"> Inventaire</a>
            </button>
            <button class="button" data-text="Panoramix">
                <a class="actual-text,itemNavigation">Panoramix</a>
                <a href="Panoramix.php" aria-hidden="true" class="hover-text">Panoramix</a>
            </button>
            <button class="button" data-text="Enigma">
                <a class="actual-text,itemNavigation">Enigma</a>
                <a href="Enigma.php" aria-hidden="true" class="hover-text">Enigma</a>
            </button>
            <button class="button" data-text="Chevaleresk">
                <a class="actual-text,titleNavigation">Chevaleresk</a>
                <a href="mainMenu.php" aria-hidden="true" class="hover-text">Chevaleresk</a>
            </button>
            <button class="button" data-text="Boutique">
                <a class="actual-text,itemNavigation">Boutique</a>
                <a href="Boutique.php" aria-hidden="true" class="hover-text">Boutique</a>
            </button>
            <button class="button" data-text="Panier">
                <a class="actual-text,itemNavigation">Panier</a>
                <a href="Panier.php" aria-hidden="true" class="hover-text">Panier</a>
            </button>
            <button class="button" data-text="Profil">
                <a class="actual-text,itemNavigation">Profil</a>
                <a href="login.php" aria-hidden="true" class="hover-text">Profil</a>
            </button>
    </div>
    HTML;
?>