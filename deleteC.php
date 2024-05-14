<?php
include_once "Models/joueurs.php";
include_once 'Models/items.php';
include_once 'MySql/db_connection.php';
include_once 'php/sessionManager.php';


if($_SESSION["currentPlayer"] !== null) {
    $idItem = $_GET['idItem'];

    DB::deleteComment($idItem);
    header("Location: reviews.php?id=$idItem");
    exit();
} else {
    header("Location: boutique.php");
    exit();
}