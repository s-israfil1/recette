<?php
session_start();

require_once(__DIR__ . '/isConnect.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Ajout de recette</title>
    <link href="style/partage_recettes.css" rel="stylesheet">
</head>
<body class="body_ajoutrec">
    <header>
        <?php require_once(__DIR__ . '/header.php'); ?>
    </header>
    <main>
        <div class="title_ajoutrec">
            <h2>Ajouter une recette</h2>
        </div>
        <section class="section_ajoutrec">
            <div class="form_ajoutrec">
                <form action="recipes_post_create.php" method="POST">
                    <div class="formgroup_ajoutrec">
                        <label for="title" >Titre de la recette</label><br>
                        <input type="text" class="champs_ajoutrec" id="title" name="title" aria-describedby="title-help" required>
                        <div id="title-help" class="baschamps">Choisissez un titre percutant !</div>
                    </div>
                    <div class="formgroup_ajoutrec">
                        <label for="recipe" >Description de la recette</label><br>
                        <textarea class="textera_ajoutrec" placeholder="Seulement du contenu vous appartenant ou libre de droits." id="recipe" name="recipe" required></textarea>
                    </div>
                    <div class="formgroup_ajoutrec">
                        <button type="submit" class="bouton_ajoutrec">Ajouter</button>
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
