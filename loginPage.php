<?php
    $actionUrl = "confirmLogin.php";
    
    $content = <<<HTML
        <div id="main" class="main">
            <div id="header">
                <h1 class="title">Log in</h1>
            </div>
            <div id="content">
                <form class="form" id="subscribeform" action="$actionUrl" method="POST">
                    <input type="hidden" name="id" value="$Id">
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
                        <a href="index.php"><input class="formControl button-SignIn, button" type="button" value="Sign in" /></a>
                    </div>
                    </div>
                    <div class="div-button">
                        <a href="your_destination_url_here">
                            <button class="formControl button-Forgot" value="Forgot password">Forgot password</button>                
                        </a> 
                        <a href="">
                            <button class="formControl button-SignUn" type="button" value="Sign Un">Sign Up</button>                
                        </a> 
                    </div>

                </form>
            </div>
        </div>
    HTML;
    include "Views/master.php";

