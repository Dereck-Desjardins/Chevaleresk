<?php
include_once "Models/joueurs.php";
include_once 'Models/items.php';
include_once 'MySql/db_connection.php';
include_once 'php/sessionManager.php';
include "views/master.php";

if($_SESSION["currentPlayer"] !== null && $_SESSION["currentPlayer"]->getPanier() !== null){
    foreach ($_SESSION["currentPlayer"]->Panier->items as $itemId => $quantity) {

        $idJoueur = $_SESSION["currentPlayer"]->getId();

        DB::BuyBuyCart($itemId,$idJoueur,$quantity);
        //Mise a jour de money dans header
       $newSolde =DB::getSolde($idJoueur)[0]['solde'];
        $_SESSION["currentPlayer"]->setSolde($newSolde);
    }
    header("Location: emptyCart.php");
    exit();
} else {
    header("Location: panier.php");
    exit();
}

