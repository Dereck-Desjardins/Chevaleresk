<?php
    $styles = "css/header.css";
    $pageTitle = "Chevaleresk";
    $header = <<< HTML
    <div class="menuNavigation">
        <div>
            <img class="img"src="Image/logo.jpg" alt="">
            <button class="button" data-text="Chevaleresk">
                <a class="actual-text,titleNavigation">Chevaleresk</a>
                <a href="mainMenu.php" aria-hidden="true" class="hover-text">Chevaleresk</a>
            </button>
            <button class="button" data-text="Panoramix">
                <a class="actual-text,itemNavigation">Panoramix</a>
                <a href="Panoramix.php" aria-hidden="true" class="hover-text">Panoramix</a>
            </button>
            <button class="button" data-text="Enigma">
                <a class="actual-text,itemNavigation">Enigma</a>
                <a href="Enigma.php" aria-hidden="true" class="hover-text">Enigma</a>
            </button>
            <button class="button" data-text="Boutique">
                <a class="actual-text,itemNavigation">Boutique</a>
                <a href="Boutique.php" aria-hidden="true" class="hover-text">Boutique</a>
            </button><button class="button" data-text="Profil">
                <a class="actual-text,itemNavigation">Profil</a>
                <a href="login.php" aria-hidden="true" class="hover-text">Profil</a>
            </button>
        </div>
    </div>
    HTML;
?>