<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Page Contact</title>
    <link href="style/partage_recettes.css" rel="stylesheet">
<body class="body_contact">
    <header>
        <?php require_once(__DIR__ . '/header.php'); ?>
    </header>
    <main class="maincontact">
        <div class="title_contact">
            <h2>Contactez nous</h2>
        </div>
        <section class="sectioncontact">
            <div class="form_contact">
                <form action="submit_contact.php" method="POST" enctype="multipart/form-data">
                    <div class="formgroup_contact">
                        <label for="email" >Email</label><br>
                        <input type="email" id="email" class="champs_contact1" name="email" aria-describedby="email-help" placeholder="you@exemple.com" required>
                        <div id="email-help" class="baschamps">Nous ne revendrons pas votre email.</div>
                    </div>
                    <div class="formgroup_contact">
                        <label for="message" >Votre message</label><br>
                        <textarea  placeholder="Exprimez vous" id="message" name="message" required class="textera_contact"></textarea>
                    </div>
                    <div class="formgroup_contact">
                        <label for="screenshot" >Votre capture d'écran si possible</label><br>
                        <input type="file" class="champs_contact2" id="screenshot" name="screenshot">
                    </div>
                    <div class="formgroup_contact">
                        <button type="submit" class="bouton_contact">Envoyer</button>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <footer>
        <?php require_once(__DIR__ . '/footer.php'); ?>
    </footer>
</body>
</html>
