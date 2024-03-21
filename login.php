<?php
$content = <<<HTML
    <div class="loginContent">
      <div id="main" class="main">
        <div id="content">
            <form class="form" id="subscribeform" method="POST">
                <input type="hidden" name="id">
            <div class="inputbox">
                <input type="email" class="formControl Email" name="Email" id="Email" required requireMessage="Veuillez entrer votre adresse de courriel" InvalidMessage="Courriel invalide">
                <span>Courriel</span>
                <i></i>
            </div>
            <br />
            <div class="inputbox">
                <input type="password" class="formControl" name="MDP" id="MDP" required requireMessage="Veuillez entrer votre mot de passe"  type="text">
                <span>Mot de passe</span>
                <i></i>
            </div>
            <br />
            <div>
                <a href="index.php"><input class="formControl button-SignIn" type="button" value="Sign in" /></a>
            </div>
            </div>
                <div class="div-button">
                    <a href="signin.php">
                        <button class="formControl button-SignUn" type="button" value="Sign Un">Sign Up</button>                
                    </a> 
                </div>
       </form>
      </div>
     </div>            
    </div>
    HTML;
include "views/master.php";
?>