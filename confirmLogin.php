<?php 
    include_once "Models/joueurs.php";
    session_start();
    $_POST["Email"];
    $_POST["MDP"];
    $joueur = new Joueurs($_POST["Email"]);
    $_SESSION["currentPlayer"] = $joueur;
    header('Location: boutique.php');
