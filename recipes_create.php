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
                <form action="recipes_post_create.php" method="POST" enctype="multipart/form-data">
                    <div class="formgroup_ajoutrec">
                        <label for="title" >Titre de la recette</label><br>
                        <input type="text" class="champs_ajoutrec1" id="title" name="title" aria-describedby="title-help" required>
                        <div id="title-help" class="baschamps">Choisissez un titre percutant !</div>
                    </div>
                    <div class="formgroup_ajoutrec">
                        <label for="title" >Category</label><br>
                        <select name="category" id="category" class="select_ajoutrec">
                            <option value="africain">Africain</option>
                            <option value="oriental">Oriental</option>
                            <option value="occidental">Occidental</option>
                            <option value="vegane">Végane</option>
                            <option value="asiatique">Asiatique</option>
                            <option value="patisserie">Patisserie</option>
                        </select>
                        <div id="select-help" class="baschamps">Veillez choisir une category !</div>
                    </div>
                    <div class="formgroup_ajoutrec">
                        <label for="recipe" >Origin</label><br>
                        <textarea class="textera_ajoutrec1" placeholder="Decrivez l'origin de votre recette." id="origin" name="origin" required></textarea>
                    </div>
                    <div class="formgroup_ajoutrec">
                        <label for="recipe" >Description de la recette</label><br/>
                        <textarea class="textera_ajoutrec2" placeholder="Seulement du contenu vous appartenant ou libre de droits." id="recipe" name="recipe" required></textarea>
                    </div>
                    <div class="formgroup_ajoutrec">
                        <label for="recipe" >Image</label><br/>
                        <input type="file"  id="imageToUpload" name="imageToUpload" class="champs_ajoutrec2" required />
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
