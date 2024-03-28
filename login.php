<?php
require 'php/sessionManager.php';

if(isset($_GET['message']) && isset($_GET['message']) == 1){
    $message = "Veuillez vous connecter pour acceder a votre panier!";
}
else{
    $message = '';
}

if (!isset($_SESSION['currentPlayer'])) {
    $Email = isset($_SESSION['Email']) ? $_SESSION['Email'] : '';
    $LoginError = isset($_SESSION['LoginError']) ? $_SESSION['LoginError'] : '';


    $content = <<<HTML
        <div class="loginContent">
            <div id="main" class="main">
                <div id="content">
                    <div class="erreur">$message</div>
                    <form class="form" id="subscribeform" method="POST" action='confirmLogin.php'>
                        <input type="hidden" name="id">
                    <div class="inputbox">
                        <input value="$Email" type="email" class="formControl Email" name="Email" id="Email" required requireMessage="Veuillez entrer votre adresse de courriel" InvalidMessage="Courriel invalide">
                        <span>Courriel</span>
                    <i></i>
                </div>
                <br />
                <div class="inputbox">
                    <input type="password" class="formControl" name="MDP" id="MDP" required requireMessage="Veuillez entrer votre mot de passe"  >
                    <span>Mot de passe</span>
                    <i></i>
                </div>
                <span style='color:red'>$LoginError</span>
                <br />
                <div>
                    <input name='submit' class="formControl button-SignIn" type="submit" value="Se connecter" />
                </div>
           </form>
           </div>
           <div class="div-button">
                    <a href="signup.php">
                        <button class="formControl button-SignUp" type="button" value="Sign Un">Sign Up</button>                
                        </a> 
            </div>     
          </div>
         </div>            
        </div>
        HTML;
} else {
    redirect('profil.php');
}

include "views/master.php";