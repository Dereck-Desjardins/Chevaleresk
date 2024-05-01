<?php
include_once "Models/joueurs.php";
include_once 'Models/items.php';
include_once 'php/sessionManager.php';
include_once 'MySql/db_connection.php';

$Courriel = $_SESSION["Email"];
$MP = $_SESSION['currentPlayer']->MotDePasse;
$user = $_SESSION['currentPlayer'];

$username = $user->Alias;
$firstName = $user->Prenom;
$lastName = $user->Nom;
$email = $user->Courriel;
$solde = DB::getSolde($user->Id)[0]['solde'];

$content = <<<HTML
<div class="container">
    <div class="profile-card">
        <div class="profile-details">
            <h2>Mon Profil</h2>
            <div class="profile-form">
                <div class="form-group">
                    <label for="username"><i class="fas fa-user"></i> Nom d'utilisateur:</label>
                    <input type="text" name="username" id="username" value="$username" disabled>
                </div>
                <div class="form-group">
                    <label for="firstName"><i class="fas fa-user"></i> Prénom:</label>
                    <input type="text" name="firstName" id="firstName" value="$firstName" disabled>
                </div>
                <div class="form-group">
                    <label for="lastName"><i class="fas fa-user"></i> Nom de famille:</label>
                    <input type="text" name="lastName" id="lastName" value="$lastName" disabled>
                </div>
                <div class="form-group">
                    <label for="Courriel"><i class="fas fa-envelope"></i> Email:</label>
                    <input type="text" name="Courriel" id="Courriel" value="$email" disabled>
                </div>
                <div class="form-group">
                    <label for="MDP"><i class="fas fa-lock"></i> Mot de passe:</label>
                    <input type="text " name="MDP" id="MDP" value="$MP" disabled>
                </div>
                <div class="form-group">
                    <label for="écus"><i class="fas fa-coins"></i> Solde:</label>
                    <input type="text" name="écus" id="écus" value="$solde écus" disabled>
                </div>
                <button id="modifierButton" onclick="modifierContenu()"><i class="fas fa-edit"></i> Modifier</button>
                <button><i class="fas fa-box"></i> <a href="inventaire.php">Inventaire</a></button>
                <button><i class="fas fa-shopping-cart"></i> <a href="panier.php">Panier</a></button>
                <button><i class="fas fa-sign-out-alt"></i> <a href="logout.php">Déconnexion</a></button>
            </div>
        </div>
    </div>
</div>
HTML;
include "views/master.php";
?>

<style>

    .profile-card {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .profile-details {
        padding: 20px;
    }

    .profile-details h2 {
        color: #333;
        font-size: 24px;
        margin-bottom: 20px;
    }

    .profile-form {
        max-width: 400px;
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 8px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        color: #333;
        margin-bottom: 5px;
        font-size: 16px;
    }

    .form-group input {
        width: calc(100% - 40px);
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        transition: border-color 0.3s;
    }

    .form-group input:disabled {
        background-color: #f9f9f9;
    }

    .form-group input:focus {
        border-color: #007bff;
    }

    .profile-form button {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s;
        margin-right: 10px;
        display: inline-flex;
        align-items: center;
    }

    .profile-form button:hover {
        background-color: #0056b3;
    }

    .profile-form button a {
        text-decoration: none;
        color: #fff;
        margin-left: 5px;
    }

    .profile-form button i {
        margin-right: 5px;
    }
</style>

<script src="https://kit.fontawesome.com/a076d05399.js"></script>

<script>
    function modifierContenu() {
    var inputs = document.querySelectorAll('#left-section input[type="text"]');
    inputs.forEach(function(input) {
        if(input.name !== "écus")
            input.disabled = !input.disabled;
    });

    var modifierButton = document.getElementById('modifierButton');
    var enregistrerButton = document.getElementById('enregistrerButton');
    var modifierForm = document.getElementById('modifierForm');

    if (modifierButton.textContent === "Modifier") {
        modifierButton.textContent = "Enregistrer";
        enregistrerButton.style.display = "inline-block";
        modifierForm.style.display = "block";
        updateJoueur(joueurId);
        console.log("pwnis");
    } else {

        modifierButton.textContent = "Modifier";
        enregistrerButton.style.display = "none";
        modifierForm.style.display = "none";
    }
}

    function updateJoueur(joueurId){
        var username = document.getElementById("username").value;
        var firstName = document.getElementById("firstName").value;
        var lastName = document.getElementById("lastName").value;
        var email = document.getElementById("Courriel").value;
        var password = document.getElementById("MDP").value;
        window.location.href = "updateInfo.php?username="+username+ "&lastName=" + lastName + "&firstName=" + firstName + "&Courriel=" + Courriel + "&MDP=" + password 
    }
</script>
