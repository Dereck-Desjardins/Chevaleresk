<?php   
    include_once "Models/joueurs.php";
    session_start();
    //retreive info par $_post
    Joueurs::CreatePlayer($_POST);

    $joueur = new Joueurs();
    $_SESSION["currentPlayer"] = $joueur;
    header('Location: boutique.php');