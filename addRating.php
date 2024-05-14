<?php
include_once "Models/joueurs.php";
include_once 'Models/items.php';
include_once 'MySql/db_connection.php';
include_once 'php/sessionManager.php';


if($_SESSION["currentPlayer"] !== null) {
    $idItem = $_GET['idItem'];
    $comment = $_GET['comment'];
    $stars = $_GET['stars'];

    DB::insertComment($idItem, $comment, $stars);
    header("Location: detailItem.php?id=$idItem");
    exit();
} else {
    header("Location: boutique.php");
    exit();
}