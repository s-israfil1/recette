
<!--
   Si utilisateur/trice est non identifié(e), on affiche le formulaire
-->
<?php if (!isset($_SESSION['LOGGED_USER'])) : ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>CONNEXION</title>
            <link href="style/partage_recettes.css" rel="stylesheet">
        </head>
        <body class="body_login">
            <section class="sectionlogin0">
                <div class="visite">
                    <a href="index.php" class="lrejoindre1">Visiter la plateforme</a>
                </div>
            </section>
            <header class="header_login">
                
                <div class="txt_login">
                    <p>
                        Bienvenue dans l'univers des saveurs.
                    </p>
                    <p>
                        Reconnectez-vous à votre passion et entrez dans votre univers culinaire<br>
                        Connectez-vous et savourez chaque instant.
                    </p>
                </div>
            </header>
            <main>
                <section class="sectionlogin">
                    <div class="form_login">
                        <h5>Veillez vous connecter</h5>
                        <form action="submit_login.php" method="POST">
                            <!-- si message d'erreur on l'affiche -->
                            <?php if (isset($_SESSION['LOGIN_ERROR_MESSAGE'])) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $_SESSION['LOGIN_ERROR_MESSAGE'];
                                    unset($_SESSION['LOGIN_ERROR_MESSAGE']); ?>
                                </div>
                                <?php endif; ?>
                            <div class="formgroup_login">
                                <label for="email">Email</label>
                                <input type="email"  id="email" class="champs_login" name="email" aria-describedby="email-help" placeholder="you@exemple.com">
                                <div id="email-help" class="baschamps">L'email utilisé lors de la création de compte.</div>
                            </div>
                            <div class="formgroup_login">
                                <label for="password">Mot de passe</label>
                                <input type="password" class="champs_login" id="password" name="password" placeholder="mot de passe">
                            </div>
                            <div class="formgroup_login">
                                <button type="submit" class="bouton_login">Connexion</button>
                            </div>
                        </form>
                    </div>
                </section>
                <section class="sectionregister2">
                        <div class="redirect">
                            <div class="boiteredirect">
                                <p class="txtredirect">Vous n'avez pas de <u>compte</u> ?</p>
                            </div>
                            <div class="boiteredirect">
                                <a href="register.php" class="boutonredirect">Creer un compte ici</a>
                            </div>
                        </div>
                </section>
                
            </main>
            <footer>
                <!-- inclusion du bas de page du site -->
                <?php require_once(__DIR__ . '/footer.php'); ?>
            </footer>
                <!-- Si utilisateur/trice bien connectée on affiche un message de succès -->
                <?php else : ?>
                            <div class="boite_alert">
                                <div class="alert_success" role="alert">
                                    Bonjour <?php echo $_SESSION['LOGGED_USER']['name']; ?> et bienvenue dans votre espace culinaire !
                                </div>
                            </div>
                <?php endif; ?>
        </body>
    </html>