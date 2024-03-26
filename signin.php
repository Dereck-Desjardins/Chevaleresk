<style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #2b2d31;
        }
        .title{
            color: #37FF8B;
        }
        #main {
            text-align: center;
        }

        .form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .inputbox {
            margin-top: 20px; /* Espacement entre chaque input */
            position: relative;
            width: 300px;
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
            color: #37FF8B;
            letter-spacing: 00.05em;
            transition: 0.5s;
            pointer-events: none;
        }

        .inputbox input:valid ~span,
        .inputbox input:focus ~span {
            color: #37FF8B;
            transform: translateX(-10px) translateY(-34px);
            font-size: 0.75em;
        }

        .inputbox i {
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 2px;
            background-color: #37FF8B;
            border-radius: 4px;
            transition: 0.5s;
            pointer-events: none;
            z-index: 9;
        }

        .inputbox input:valid ~i,
        .inputbox input:focus ~i {
            height: 44px;
        }

        .img{
            border-radius: 25px;
            height: 200px;
            width: 300;
        }
        .button {
            width: 148px;
            color: black;
            border: none;
            background-color: #37FF8B;
            height: 35px;
            border-radius: 5px;
            transition: all ease 0.1s;
            margin-top: 20px;
        }
        .div-button {
            width: 300px;
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }
        .avatar {
            height: 50px;
            width: 50px;
            background-color: rgb(23, 111, 211);
            border-radius: 50%;
            align-self: center;
            padding: 6px;
            cursor: pointer;
            box-shadow: 12.5px 12.5px 10px rgba(0, 0, 0, 0.015),100px 100px 80px rgba(0, 0, 0, 0.03);
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
                <label class="avatar" for="file"><span></span></label>                
                <div class="inputbox">
                    <input class="formControl" name="FirstName" id="FirstName" required requireMessage="Veuillez entrer votre prenom"  type="text">
                    <span>Prenom</span>
                    <i></i>
                </div>
                <div class="inputbox">
                    <input class="formControl" name="Nom" id="Nom" required requireMessage="Veuillez entrer votre nom"  type="text">
                    <span>Nom</span>
                    <i></i>
                </div>
                <div class="inputbox">
                    <input class="formControl" name="Username" id="Username" required requireMessage="Veuillez entrer votre Username"  type="text">
                    <span>Username</span>
                    <i></i>
                </div>
                <div class="inputbox">
                    <input type="Email " class="formControl" name="Courriel" id="Courriel" required requireMessage="Veuillez entrer votre Courriel">
                    <span>Courriel</span>
                    <i></i>
                </div>
                <div class="inputbox">
                    <input type="Email" class="formControl" name="Emailconfirmation" id="Emailconfirmation" required requireMessage="Veuillez entrer votre courriel">
                    <span>Courriel confirmation</span>
                    <i></i>
                </div>
                <div class="inputbox">
                    <input type="password" class="formControl" name="MDP" id="MDP" required requireMessage="Veuillez entrer votre mot de passe"  type="text">
                    <span>Mot de passe</span>
                    <i></i>
                </div>
                <div class="inputbox">
                    <input type="password" class="formControl" name="MDPConfirm" id="MDPConfirm" required requireMessage="Veuillez entrer votre mot de passe">
                    <span>Mot de passe</span>
                    <i></i>
                </div><br />
                <div class="div-button">
                    <button type="button" onclick="window.location.href='login.php'" class="button">Cancel</button>
                    <a href="your_destination_url_here">
                        <button class="button">Sign Up</button>
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
