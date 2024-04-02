<?php
require "Models/joueurs.php";
include_once 'Models/items.php';
include_once 'MySql/db_connection.php';
include_once 'php/sessionManager.php';
$money = "";
if (isset($_SESSION['currentPlayer'])) {
    $joueur = $_SESSION['currentPlayer'];
    $solde = $joueur->getSolde();
    $money = <<<HTML
           <a>Solde : $solde</a>
        HTML;
}
$content = <<<HTML
     <div class="content">
            <a class="logout" href="logout.php"><button>Se déconnecter</button></a>
        </div>
     HTML;
include "views/master.php";