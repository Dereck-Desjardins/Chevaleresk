<?php   
    include_once "Models/joueurs.php";
    session_start();
    DB::InsertJoueur($_POST);

    $email = $_POST["Courriel"];
    $joueur = new Joueurs($email);
    $_SESSION["currentPlayer"] = $joueur;
    header('Location: boutique.php');
    exit;