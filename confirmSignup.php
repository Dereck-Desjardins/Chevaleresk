<?php   
    include_once "Models/joueurs.php";
    include 'php/sessionManager.php';
    include 'php/formUtilities.php';
    const NIVEAU = 'debutant';
    const NONADMIN = 0 ;
try{
    DB::InsertJoueur($_POST['Alias'],$_POST['Name'],$_POST['FirstName'],NIVEAU,NONADMIN,$_POST['Password'],$_POST['Email']);
    $_SESSION['Email'] = sanitizeString($_POST['Email']);
    $joueur = new Joueurs($_POST["Email"],$_POST["Password"]);
    $_SESSION["currentPlayer"] = $joueur;
    header('Location: mainMenu.php');
}catch (Exception $e) {
    //redirige l'utilisateur vers la page de connexion avec message d'erreur
    $_SESSION['SignUpError'] = "Une erreur se trouve dans les informations ;)";
    header('Location: signup.php');
}

