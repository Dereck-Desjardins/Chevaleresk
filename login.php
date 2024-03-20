<style>
    body {
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        Border-width: 3px;
        border-style: solid;
        border-color: black;
        background-color: #E0E0E0;
    }

    .formControl {
        margin-bottom: 10px;
    }

    .button-SignIn {
        width: 300px;
        color: #FFFFFF;
        border: none;
        background-color: #2CB3F0;
        height: 35px;
    }
    .button-SignUn {
        width: 125px;
        color: #2CB3F0;
        border: none;
        background-color: transparent;
        color: #2CB3F0;
    }

    .button-Forgot {
        width: 125px;
        border: none;
        background-color: transparent;
    }

    input {
        width: 300px;
    }

    .div-button {
        width: 300px;
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
    }
    .button {
            
            border: none;
            background-color: #2CB3F0;
            height: 35px;
            border-radius: 5px;
            transition: all ease 0.1s;
            box-shadow: 0px 5px 0px 0px #2CB3F0;
		}

   .button:active {
      transform: translateY(5px);
      box-shadow: 0px 0px 0px 0px #a29bfe;
   }
   .inputbox {
  position: relative;
  width: 196px;
}

.inputbox input {
  position: relative;
  width: 100%;
  padding: 20px 10px 10px;
  background: transparent;
  outline: none;
  box-shadow: none;
  border: none;
  color: #23242a;
  font-size: 1em;
  letter-spacing: 0.05em;
  transition: 0.5s;
  z-index: 10;
}

.inputbox span {
  position: absolute;
  left: 0;
  padding: 20px 10px 10px;
  font-size: 1em;
  color: #8f8f8f;
  letter-spacing: 00.05em;
  transition: 0.5s;
  pointer-events: none;
}

.inputbox input:valid ~span,
.inputbox input:focus ~span {
  color: #45f3ff;
  transform: translateX(-10px) translateY(-34px);
  font-size: 0,75em;
}

.inputbox i {
  position: absolute;
  left: 0;
  bottom: 0;
  width: 100%;
  height: 2px;
  background: #45f3ff;
  border-radius: 4px;
  transition: 0.5s;
  pointer-events: none;
  z-index: 9;
}

.inputbox input:valid ~i,
.inputbox input:focus ~i {
  height: 44px;
}
</style>

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
                <a href="your_destination_url_here">
                    <button class="formControl button-SignUn" type="button" value="Sign Un">Sign Up</button>                
                </a> 
            </div>

        </form>
    </div>
</div>
