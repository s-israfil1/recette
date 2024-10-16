<!-- inclusion des variables et fonctions -->
<?php
session_start();
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');
require_once(__DIR__ . '/variables.php');
require_once(__DIR__ . '/functions.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de recettes - Page d'accueil</title>
    <link href="style/partage_recettes.css" rel="stylesheet">
</head>
<body class="body_index">
    <div class="container">
        <!-- inclusion de l'entête du site -->
        <?php require_once(__DIR__ . '/header.php'); ?>
        <h1>SAVEURS DU MONDE</h1>

        <!-- Formulaire de connexion -->
        <?php require_once(__DIR__ . '/login.php'); ?>

        <?php foreach (getRecipes($recipes) as $recipe) : ?>
            <article>
                <h3><a href="recipes_read.php?id=<?php echo($recipe['recipe_id']); ?>"><?php echo($recipe['title']); ?></a></h3>
                <div><?php echo $recipe['recipe']; ?></div>
                <i><?php echo displayAuthor($recipe['author'], $users); ?></i>
                <?php if (isset($_SESSION['LOGGED_USER']) && $recipe['author'] === $_SESSION['LOGGED_USER']['email']) : ?>
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item"><a class="link-warning" href="recipes_update.php?id=<?php echo($recipe['recipe_id']); ?>">Editer l'article</a></li>
                        <li class="list-group-item"><a class="link-danger" href="recipes_delete.php?id=<?php echo($recipe['recipe_id']); ?>">Supprimer l'article</a></li>
                    </ul>
                <?php endif; ?>
            </article>
        <?php endforeach ?>
    </div>
</body>
    <!-- inclusion du bas de page du site -->
    <?php require_once(__DIR__ . '/footer.php'); ?>
</html>
