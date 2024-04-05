<?php
include_once "Models/joueurs.php";
include_once 'Models/items.php';
include_once 'php/sessionManager.php';
include_once 'MySql/db_connection.php';
$Courriel = $_SESSION["Email"];
$MP = $_SESSION['currentPlayer'] -> MotDePasse;
$user= $_SESSION['currentPlayer'];

$username = $user->Alias;
$firstName = $user->Prenom;
$lastName = $user->Nom;
$email = $user->Courriel;
$solde = DB::getSolde($user->Id)[0]['solde'];

$content = <<<HTML
<div class="itemLayout">
    <div class="left-section" id="left-section">
        <input type="text" name="username" id="username" value="$username" disabled>
        <input type="text" name="firstName" id="firstName" value="$firstName" disabled>
        <input type="text" name="lastName" id="lastName" value="$lastName" disabled>
        <input type="text" name="Courriel" id="Courriel" value="$Courriel" disabled>
        <input type="text" name="MDP" id="MDP" value="$MP" disabled>
        <input type="text" name="écus" id="écus" value="$solde" disabled>
    </div>
    <div class="right-section">
             <button id="modifierButton" onclick="modifierContenu()">Modifier</button>
              <button><a href="inventaire.php">Inventaire</a></button>
              <button><a href="panier.php">Panier</a></button>
              <button><a href="logout.php">Deconnection</a></button>
              <!-- <button><a href=".php">Demander de l'argent</a></button> -->
    </div>
</div>
HTML;
include "views/master.php";
?>

<style>
    .itemLayout {
        display: flex;
        border: 1px solid black;
        padding: 5px 10px;
        text-decoration: none;
        color: #444;
        font-weight: 500;
        transition: color 0.3s ease-in-out;
    }

    .itemLayout a {
          text-decoration: none;
          color: #444;
          font-weight: 500;
          transition: color 0.3s ease-in-out;
     }

    .left-section, .right-section {
        flex: 1; 
    }

    .left-section {
        margin-right: 10px;
    }

    .left-section input[type="text"] {
        margin-bottom: 10px; 
        display: block; 
    }

    .right-section button {
        margin-bottom: 10px; /* Espacement entre chaque bouton */
        display: block; /* Les boutons sont affichés comme des blocs */
    }
</style>


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