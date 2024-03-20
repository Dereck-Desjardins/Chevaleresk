<?php
    $actionUrl = "confirmSignup.php";
    $content = <<<HTML
        <div id="main">
            <div id="header">
                <h2 class="title">Création de compte</h2>
            </div>
            <div id="content">
                <form class="form" id="subscribeform" action="$actionUrl" method="POST">
                    <input type="hidden" name="id" value="$Id">
                    <img class="roundImage" src="url_de_votre_image" alt="Image" />
                    <legend>Prenom</legend>
                    <input class="formControl Alpha" name="Prenom" placeholder="Prenom" required RequireMessage="Veuillez entrer votre prenom" InvalidMessage="Caractères illégaux" />
                    <legend>Nom</legend>
                    <input class="formControl Alpha" name="Nom" placeholder="Nom" required RequireMessage="Veuillez entrer votre nom" InvalidMessage="Caractères illégaux" />
                    <legend>Username</legend>
                    <input class="formControl Alpha" name="Alias" placeholder="Username" required RequireMessage="Veuillez entrer votre Username" InvalidMessage="Caractères illégaux" />
                    
                    <legend>Courriel</legend>
                    <input type="email" class="formControl Email" name="Email" id="Email" placeholder="Courriel" required requireMessage="Veuillez entrer votre adresse de courriel" InvalidMessage="Courriel invalide" />
                    <legend>Courriel confirmation</legend>
                    <input type="email" class="formControl Email" name="Emailconfirmation" id="Emailconfirmation" placeholder="Courriel" required requireMessage="Veuillez entrer votre adresse de courriel" InvalidMessage="Courriel invalide" />
                    <legend>Mot de passe</legend>
                    <input type="password" class="formControl" name="MDP" id="MDP" placeholder="Mot de passe" required requireMessage="Veuillez entrer votre mot de passe" />
                    <legend>Confirmation mot de passe</legend>
                    <input type="password" class="formControl" name="ConfirmMDP" id="ConfirmMDP" placeholder="Confirmation mot de passe" required requireMessage="Veuillez confirmer votre mot de passe" />
                    <br />
                    <a href="confirmSignup.php">
                        <button class="button">Sign Up</button>                
                    </a>    
                </form>
            </div>
        </div>
    HTML;
    include "Views/master.php";

