<?php
include_once "Models/joueurs.php";
include_once 'Models/items.php';
include_once 'MySql/db_connection.php';
include_once 'php/sessionManager.php';


if(isset( $_SESSION["currentPlayer"])) {

    $joueur = $_SESSION["currentPlayer"];
    $joueurId = $joueur->getId();
    $username = $_GET['username'];
    $firstName = $_GET['firstName'];
    $lastName = $_GET['lastName'];
    $email = $_GET['Courriel'];
    $password = $_GET['MDP'];

    DB::UpdateJoueur($joueurId, $username,$lastName,$firstName, $password, $email);
    header("Location: profil.php");
}