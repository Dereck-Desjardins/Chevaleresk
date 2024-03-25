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
<<<<<<< HEAD
       </form>
      </div>
     </div>            
    </div>
    HTML;
=======
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
                        <a href="signin.php">
                            <button class="formControl button-SignUn" type="button" value="Sign Un">Sign Up</button>                
                        </a> 
                    </div>
          </div>
         </div>            
        </div>
        HTML;
}
else{
   redirect('profil.php');
}

>>>>>>> parent of 76f2f57 (Merge branch 'main' of https://github.com/Dereck-Desjardins/Chevaleresk)
include "views/master.php";
