<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Page Contact</title>
    <link href="style/partage_recettes.css" rel="stylesheet">
<body>
    <header>
        <?php require_once(__DIR__ . '/header.php'); ?>
    </header>
    <main>
        <section class="sectioncontact">
            <div class="title_contact">
                <h2>Contactez nous</h2>
            </div>
            <form action="submit_contact.php" method="POST" enctype="multipart/form-data">
                <div >
                    <label for="email" >Email</label>
                    <input type="email" id="email" name="email" aria-describedby="email-help">
                    <div id="email-help" >Nous ne revendrons pas votre email.</div>
                </div>
                <div >
                    <label for="message" >Votre message</label>
                    <textarea  placeholder="Exprimez vous" id="message" name="message"></textarea>
                </div>
                <div >
                    <label for="screenshot" >Votre capture d'écran</label>
                    <input type="file"  id="screenshot" name="screenshot" />
                </div>
                <button type="submit" >Envoyer</button>
            </form>
        </section>
    </main>

    <footer>
        <?php require_once(__DIR__ . '/footer.php'); ?>
    </footer>
</body>
</html>
