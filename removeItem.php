<?php
include_once "Models/joueurs.php";
include_once 'Models/items.php';
include_once 'MySql/db_connection.php';
include_once 'php/sessionManager.php';

$itemId = $_GET['id'];
$joueur = $_SESSION["currentPlayer"];
$panier= $joueur->getPanier();
$panier->retirerItem($itemId);  
    
header("Location: panier.php");
exit();



