<?php 
    include_once "Models/joueurs.php";
    session_start();
    $joueur = new Joueurs($_POST["Email"]);
    $_SESSION["currentPlayer"] = $joueur;
    header('Location: boutique.php');
    exit;
