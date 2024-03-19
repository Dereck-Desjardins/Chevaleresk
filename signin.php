<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        #main {
            text-align: center;
        }
        
        .formControl {
            margin-bottom: 10px;
        }
        
        img {
            border-radius: 50%;
            max-width: 250px; 
            max-height: 250px;
            border: 2px solid black;
            margin-bottom: 20px;
		}
        
        input{
        	width: 300px;
            height: 45px;
        }
        
        legend{
        	text-align: left;
        }

        .button {
            width: 300px;
            color: #FFFFFF;
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
    </style>
</head>
<body>
    <div id="main">
        <div id="header">
            <h2 class="title">Création de compte</h2>
        </div>
        <div id="content">
            <form class="form" id="subscribeform" action="$actionUrl" method="POST">
                <input type="hidden" name="id" value="$Id">
                <img class="roundImage" src="url_de_votre_image" alt="Image" />
                <legend>Prenom</legend>
                <input class="formControl Alpha" name="FirstName" placeholder="Prenom" required RequireMessage="Veuillez entrer votre prenom" InvalidMessage="Caractères illégaux" />
                <legend>Nom</legend>
                <input class="formControl Alpha" name="Name" placeholder="Nom" required RequireMessage="Veuillez entrer votre nom" InvalidMessage="Caractères illégaux" />
                <legend>Username</legend>
                <input class="formControl Alpha" name="Username" placeholder="Username" required RequireMessage="Veuillez entrer votre Username" InvalidMessage="Caractères illégaux" />
                
                <legend>Courriel</legend>
                <input type="email" class="formControl Email" name="Email" id="Email" placeholder="Courriel" required requireMessage="Veuillez entrer votre adresse de courriel" InvalidMessage="Courriel invalide" />
                <legend>Courriel confirmation</legend>
                <input type="email" class="formControl Email" name="Emailconfirmation" id="Emailconfirmation" placeholder="Courriel" required requireMessage="Veuillez entrer votre adresse de courriel" InvalidMessage="Courriel invalide" />
                <legend>Mot de passe</legend>
                <input type="password" class="formControl" name="MDP" id="MDP" placeholder="Mot de passe" required requireMessage="Veuillez entrer votre mot de passe" />
                <legend>Confirmation mot de passe</legend>
                <input type="password" class="formControl" name="ConfirmMDP" id="ConfirmMDP" placeholder="Confirmation mot de passe" required requireMessage="Veuillez confirmer votre mot de passe" />
                <br />
                <a href="your_destination_url_here">
                    <button class="button">Sign Up</button>                
                </a>    
            </form>
        </div>
    </div>
</body>
</html>
