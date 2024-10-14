<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSCRIPTION</title>
    <link href="style/partage_recettes.css" rel="stylesheet">
</head>
<body class="body_register">
    <header class="header_register">
        <div class="titleheader_register">
            <h1><span>S</span>AVEURS <span>D</span>U <span>M</span>ONDE</h1>
        </div>
        <div class="txt_register">
            <p>
                Bienvenue sur notre plateforme de partage de recette partout à travers le monde.
            </p>
            <p>
                Nous vous invitons à vous inscrire pour rejoindre notre communauté de passionnés de 
                cuisine afin de <br>partager, découvrir et inspirer les gourmets du monde entier.
            </p>
        </div>
    </header>

    <main>
        <section class="sectionregister1">
            <div class="form_register">
                <h5>Inscrivez-vous</h5>
                <form action="submit_register.php" method="POST">
                    <div class="formgroup_register">
                        <label for="full_name">Nom</label><br>
                        <input type="text" id="full_name" class="champs_register" name="full_name" placeholder="ex: francis nganou" required>
                    </div>
                    <div class="formgroup_register">
                        <label for="email">Email</label><br>
                        <input type="email" id="email" class="champs_register" name="email" aria-describedby="email-help" placeholder="you@exemple.com" required>
                    </div>
                    <div class="formgroup_register">
                        <label for="password">Mot de passe</label><br>
                        <input type="password" id="password" class="champs_register" name="password" placeholder="votre mot de passe" required>
                    </div>
                    <div class="formgroup_register">
                        <label for="confirm_password">Confirmation Mot de passe</label><br>
                        <input type="password" id="confirm_password" class="champs_register" name="confirm_password" placeholder="comfirmez le mot de passe" required>
                    </div>
                    <div class="formgroup_register">
                        <label for="age">Age</label><br>
                        <input type="number" id="age" name="age" class="champs_register" min="18" placeholder="votre age" required>
                    </div>
                    <div class="formgroup_register">
                        <button type="submit" class="bouton_register">S'INSCRIRE</button>
                    </div>
                </form>
            </div>
        </section>
        <section class="sectionregister2">
            <div class="redirect">
                <div class="boiteredirect">
                    <p class="txtredirect">Vous avez deja <u>un compte ?</u></p>
                </div>
                <div class="boiteredirect">
                    <a href="login.php" class="boutonredirect">Se connecter ici</a>
                </div>
            </div>
        </section>
    </main>

    <footer>
            <!-- inclusion du bas de page du site -->
        <?php require_once(__DIR__ . '/footer.php'); ?>
    </footer>
</body>
   
</html>
