<style>
    body,
    html {
        height: 100%;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: white;
    }

    .title {
        color: #117964;
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
        margin-top: 20px;
        /* Espacement entre chaque input */
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
        color: white;
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
        color: #117964;
        letter-spacing: 00.05em;
        transition: 0.5s;
        pointer-events: none;
    }

    .inputbox input:valid~span,
    .inputbox input:focus~span {
        color: #117964;
        transform: translateX(-10px) translateY(-34px);
        font-size: 0.75em;
    }

    .inputbox i {
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 2px;
        background-color: #117964;
        border-radius: 4px;
        transition: 0.5s;
        pointer-events: none;
        z-index: 9;
    }

    .inputbox input:valid~i,
    .inputbox input:focus~i {
        height: 44px;
    }

    .img {
        border-radius: 25px;
        height: 200px;
        width: 300;
    }

    .button {
        width: 148px;
        color: white;
        border: none;
        background-color: #117964;
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
        box-shadow: 12.5px 12.5px 10px rgba(0, 0, 0, 0.015), 100px 100px 80px rgba(0, 0, 0, 0.03);
    }
</style>
</head>

<body>
    <?php

    if(isset($_GET['message']) && $_GET['message'] == 1){
       echo '<script>alert("Alias déja utilisé")</script>'; 
    }
    $SignUpError = isset($_SESSION['SignUpError']) ? $_SESSION['SignUpError'] : '';
    //Pourra affiché l'erreur quand css arrangé et le body mit dans un $content :)
    ?>
    <div id="main">
        <div id="header">
            <h2 class="title">Création de compte</h2>
        </div>
        <div id="content">
            <form class="form" id="subscribeform" action="confirmSignup.php" method="POST">
                <!-- <label class="avatar" for="file"><span></span></label> -->
                <div class="inputbox">
                    <input class="formControl" name="Alias" required requireMessage="Veuillez entrer votre alias"
                        maxlength="8" type="text">
                    <span>Alias</span>
                    <i></i>
                </div>
                <div class="inputbox">
                    <input class="formControl" name="Name" required requireMessage="Veuillez entrer votre nom"
                        maxlength="25" type="text">
                    <span>Nom</span>
                    <i></i>
                </div>
                <div class="inputbox">
                    <input class="formControl" name="FirstName" required requireMessage="Veuillez entrer votre prenom"
                        maxlength="25" type="text">
                    <span>Prenom</span>
                    <i></i>
                </div>
                <div class="inputbox">
                    <input type="password" class="formControl" name="Password" required
                        requireMessage="Veuillez entrer votre mot de passe" maxlength="20" type="text">
                    <span>Mot de passe</span>
                    <i></i>
                </div>

                <div class="inputbox">
                    <input type="Email" class="formControl" name="Email" required maxlength="45"
                    RequireMessage = 'Veuillez entrer votre courriel'
                        InvalidMessage = 'Courriel invalide'>
                    <span>Courriel</span>
                    <i></i>
                </div>
                <span style='color:red' value= $SignUpError></span>
                <br />
                <div class="div-button">
                    <button type="button" onclick="window.location.href='login.php'" class="button">Annuler</button>
                    <input type="submit" class="button">
                </div>
            </form>
        </div>
    </div>
</body>

</html>

     <script src='js/validation.js'></script>
    <script defer>
        initFormValidation();
    </script>

