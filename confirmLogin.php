<?php
include_once "Models/joueurs.php";
include 'php/sessionManager.php';
include 'php/formUtilities.php';

try {
    if (isset ($_POST['Email'])) {
        $_SESSION['Email'] = sanitizeString($_POST['Email']);
        $joueur = new Joueurs($_POST["Email"],$_POST["MDP"]);
        $_SESSION["currentPlayer"] = $joueur;
    }
    header('Location: mainMenu.php');

} catch (Exception $e) {
    //redirige l'utilisateur vers la page de connexion avec message d'erreur
    $_SESSION['LoginError'] = "Le courriel ou le mot de passe n'est pas valide";
    header('Location: login.php');
}
