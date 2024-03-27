<?php
include_once "Models/joueurs.php";
include_once 'Models/items.php';
include_once 'MySql/db_connection.php';
include_once 'php/sessionManager.php';


if(isset($_GET['itemId']) && $_SESSION["currentPlayer"] !== null) {
    $itemId = $_GET['itemId'];
    $joueur = $_SESSION["currentPlayer"];
    $quantity = $_GET['quantity'];

    
    $oneItem = DB::getItemById($itemId);

    if($oneItem) {
        $item = new Item();
        $item->Id = $oneItem->idItem;
        $item->Nom = $oneItem->nom;
        $item->QuantiteStock = $oneItem->quantiteStock;
        $item->TypeItem = $oneItem->typeItem;
        $item->Prix = $oneItem->prix;
        $item->Photo = $oneItem->photo;

        $joueur->getPanier()->ajouterItem($item, $quantity);

        
     header("Location: boutique.php");
     exit();
    } else {
        header("Location: boutique.php");
        exit();
    }
} else {
    header("Location: boutique.php");
    exit();
}


