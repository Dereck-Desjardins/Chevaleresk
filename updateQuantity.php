<?php
include_once "Models/joueurs.php";
include_once 'Models/items.php';
include_once 'MySql/db_connection.php';
include_once 'php/sessionManager.php';


if(isset($_GET['itemId']) && isset($_GET['newQuantity']) && $_SESSION["currentPlayer"] !== null) {
    $itemId = $_GET['itemId'];
    $quantity = $_GET['newQuantity'];

    $joueur = $_SESSION["currentPlayer"];

    $joueur->getPanier()->changerQuantiteItem($itemId, $quantity);

    header("Location: panier.php");
    exit();
} else {
    header("Location: panier.php");
    exit();
}
    
