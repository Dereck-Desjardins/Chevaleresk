<?php
include_once "Models/joueurs.php";
include_once 'Models/items.php';
include_once 'MySql/db_connection.php';
include_once 'php/sessionManager.php';

if ($_SESSION["currentPlayer"] !== null) {
    $_SESSION["currentPlayer"]->Panier->viderPanier();
}

header("Location: panier.php");
exit();
