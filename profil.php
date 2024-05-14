<?php
include_once "Models/joueurs.php";
include_once 'Models/items.php';
include_once 'php/sessionManager.php';
include_once 'MySql/db_connection.php';
$user = $_SESSION['currentPlayer'];
$userID = $user->getId();

$USER = DB::TrouverJoueurID($userID);

$Alias = $USER[0]['alias'];
$Prenom = $USER[0]['prenom'];
$Nom = $USER[0]['nom'];
$Courriel = $USER[0]['courriel'];
$Niveau = $USER[0]['niveau'];
$Exp = $USER[0]['exp'];
$Solde = $USER[0]['solde'];
$MotDePasse = $USER[0]['motdepasse'];

$Stat = DB::TrouverStat($userID);
$russi = 0;
$echoue = 0;
if($Stat != null){
    $russi = $Stat[0]['estReussie'];
    $echoue= $Stat[0]['estEchoue'];
}
$ExpValue = 0 ;

// if($Exp == 0){
//     $Exp = 
// }

$content = <<<HTML
<div class="container">
    <div class="profile-card">
        <div class="profile-details">
            <div class="profile-form">
                <h2>Mon Profil</h2>
                <div class="form-group">
                    <label for="username"><i class="fas fa-user"></i> Nom d'utilisateur:</label>
                    <input type="text" name="username" id="username" value="$Alias" disabled>
                </div>
                <div class="form-group">
                    <label for="firstName"><i class="fas fa-user"></i> Prénom:</label>
                    <input type="text" name="firstName" id="firstName" value="$Prenom" disabled>
                </div>
                <div class="form-group">
                    <label for="lastName"><i class="fas fa-user"></i> Nom de famille:</label>
                    <input type="text" name="lastName" id="lastName" value="$Nom" disabled>
                </div>
                <div class="form-group">
                    <label for="Courriel"><i class="fas fa-envelope"></i> Email:</label>
                    <input type="text" name="Courriel" id="Courriel" value="$Courriel" disabled>
                </div>
                <div class="form-group">
                    <label for="MDP"><i class="fas fa-lock"></i> Mot de passe:</label>
                    <input type="text" name="MDP" id="MDP" value="$MotDePasse" disabled>
                </div>
                <div class="form-group">
                    <label for="écus"><i class="fas fa-coins"></i> Solde:</label>
                    <input type="text" name="écus" id="écus" value="$Solde écus" disabled>
                </div>
                <button id="modifierButton" onclick="modifierContenu()">Modifier</button>
                <button><i class="fas fa-box"></i> <a href="inventaire.php">Inventaire</a></button>
                <button><i class="fas fa-shopping-cart"></i> <a href="panier.php">Panier</a></button>
                <button><i class="fas fa-sign-out-alt"></i> <a href="logout.php">Déconnexion</a></button>
            </div>
            <div class="right-section">
                <div class="form-group">
                    <label for="niveau"><i class="fa-solid fa-flask"></i> Niveau: $Niveau</label> <!-- Ajout de l'icône du niveau -->
                    <div class="cardprogress"><progress max="99" value="$ExpValue"></progress></div>
                </div>
                <h2>Statistique Enigma:</h2>
                <div class="stat">
                    <div>
                        <div>
                            Réussite:
                        </div>
                        <div>
                            $russi
                        </div>
                    </div>
                    <div>
                        <div>
                            Échec:
                        </div>
                        <div>
                            $echoue
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
HTML;
include "views/master.php";

?>

<style>
    .cardprogress progress {
    width: 100%;
    height: 20px; /* Modification de la hauteur */
    border-radius: 100px;
}

.cardprogress progress::-webkit-progress-bar {
    background-color: #00000030;
    border-radius: 100px;
}

.profile-card {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    margin: 20px; /* Ajout de la marge */
}

.profile-details {
    padding: 20px;
    display: grid;
    grid-template-columns: 50% 50%;
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
    margin-top: 20px; /* Ajout de la marge en haut */
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
    width: calc(100% - 20px); /* Modification de la largeur */
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
.right-section{
    padding-top: 50%;
}
.stat{
    display: grid;
    grid-template-columns: 50% 50%;

}
</style>


<script>
    function modifierContenu() {
        var inputs = document.querySelectorAll('.form-group input[type="text"]');
        inputs.forEach(function (input) {
            if (input.name !== "écus")
                input.disabled = !input.disabled;
        });

        var modifierButton = document.getElementById('modifierButton');
        var enregistrerButton = document.getElementById('enregistrerButton');

        if (modifierButton.textContent === "Modifier") {
            modifierButton.textContent = "Enregistrer";
            enregistrerButton.style.display = "inline-block";
        } else {
            modifierButton.textContent = "Modifier";
            enregistrerContenu();
            enregistrerButton.style.display = "none";
        }
    }

    function enregistrerContenu() {
        var username = document.getElementById("username").value;
        var firstName = document.getElementById("firstName").value;
        var lastName = document.getElementById("lastName").value;
        var email = document.getElementById("Courriel").value;
        var password = document.getElementById("MDP").value;
        window.location.href = "updateInfo.php?username=" + username + "&lastName=" + lastName + "&firstName=" + firstName + "&Courriel=" + email + "&MDP=" + password
    }
</script>
