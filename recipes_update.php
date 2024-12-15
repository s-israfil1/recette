<?php
session_start();

require_once(__DIR__ . '/isConnect.php');
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');

/**
 * On ne traite pas les super globales provenant de l'utilisateur directement,
 * ces données doivent être testées et vérifiées.
 */
$getData = $_GET;

if (!isset($getData['id']) || !is_numeric($getData['id'])) {
    echo('Il faut un identifiant de recette pour la modifier.');
    return;
}

$retrieveRecipeStatement = $mysqlClient->prepare('SELECT * FROM recipes WHERE recipe_id = :id');
$retrieveRecipeStatement->execute([
    'id' => (int)$getData['id'],
]);
$recipe = $retrieveRecipeStatement->fetch(PDO::FETCH_ASSOC);

// si la recette n'est pas trouvée, renvoyer un message d'erreur
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Edition de recette</title>
    <link href="style/partage_recettes.css" rel="stylesheet">
</head>
<body class="body_update">
    <header>
        <?php require_once(__DIR__ . '/header.php'); ?>
    </header>

    <main>
        <div class="title_update">
            <h2>Mettre à jour : <?php echo($recipe['title']); ?></h2>
        </div>
        <section class="section_update">
            <div class="form_update">
                <form action="recipes_post_update.php" method="POST" enctype="multipart/form-data" >
                    <div class="formgroup_update">
                        <label for="id"><strong>Identifiant de la recette</strong></label>
                        <input type="hidden" id="id" name="id" value="<?php echo($getData['id']); ?>">
                    </div>
                    <div class="formgroup_update">
                        <label for="title">Titre de la recette</label><br>
                        <input type="text" class="champs_update1" id="title" name="title" aria-describedby="title-help" value="<?php echo($recipe['title']); ?>">
                        <div id="title-help" class="baschamps">Choisissez un titre percutant !</div>
                    </div>
                    <div class="formgroup_update">
                        <label for="title" >Category</label><br>
                        <select name="category" id="category" class="select_update" value="<?php echo($recipe['category']); ?>">
                            <option value="africain">Africain</option>
                            <option value="oriental">Oriental</option>
                            <option value="occidental">Occidental</option>
                            <option value="vegane">Végane</option>
                            <option value="asiatique">Asiatique</option>
                            <option value="patisserie">Patisserie</option>
                        </select>
                        <div id="select-help" class="baschamps">Veillez choisir une category !</div>
                    </div>
                    <div class="formgroup_update">
                        <label for="recipe" >Origin</label><br>
                        <textarea class="textera_ajoutrec1" placeholder="Decrivez l'origin de votre recette." id="origin" name="origin" required><?php echo $recipe['origin']; ?></textarea>
                    </div>
                    <div class="formgroup_update">
                        <label for="recipe">Description de la recette</label><br>
                        <textarea class="textera_update" placeholder="Seulement du contenu vous appartenant ou libre de droits." id="recipe" name="recipe"><?php echo $recipe['recipe']; ?></textarea>
                    </div>
                    <div class="formgroup_update">
                        <label for="recipe" >Image</label><br/>
                        <input type="file"  id="imageToUpload" name="imageToUpload" class="champs_update2"  />
                    </div>
                    <div class="formgroup_update">
                        <button type="submit" class="bouton_update">Envoyer</button>
                    </div>
                </form>
                <br />
            </div>
        </section>
    </main>

    <footer>
        <?php require_once(__DIR__ . '/footer.php'); ?>
    </footer>
</body>
</html>
