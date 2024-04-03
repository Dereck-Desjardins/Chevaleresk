<?php
include_once "Models/joueurs.php";
include_once 'Models/items.php';
include_once 'MySql/db_connection.php';
include_once 'php/sessionManager.php';


if(isset($_GET['joueurId']) && $_SESSION["currentPlayer"] !== null) {
    $joueurId = $_GET['joueurId'];
    $joueur = $_SESSION["currentPlayer"];
    $username = $_GET['username'];
    $firstName = $_GET['firstName'];
    $lastName = $_GET['lastName'];
    $email = $_GET['Courriel'];
    $password = $_GET['MDP'];

    DB::UpdateJoueur($joueurId, $username,$lastName,$firstName, $email, $password);
    }