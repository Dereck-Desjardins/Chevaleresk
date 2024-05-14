<?php
include_once "Models/joueurs.php";
include_once 'Models/items.php';
include_once 'MySql/db_connection.php';
include_once 'php/sessionManager.php';


if(isset($_GET['idPotion']) && $_SESSION["currentPlayer"] !== null) {
    $idPotion = $_GET['idPotion'];
    $joueur = $_SESSION["currentPlayer"]->Id;
    $reussite = DB::Concocter($idPotion, $joueur);
    $message= 1; 
    if(!$reussite){
        $message = 2;
    }
    else{
        
    }
    header("Location: panoramix.php?ItemId=$idPotion&message=$message");
} else {
    header("Location: panoramix.php?ItemId=$idPotion");
    exit();
}