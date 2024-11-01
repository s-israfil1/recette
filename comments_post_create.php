<?php
session_start();

require_once(__DIR__ . '/isConnect.php');
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');


/**
 * On ne traite pas les super globales provenant de l'utilisateur directement,
 * ces données doivent être testées et vérifiées.
 */
$postData = $_POST;

if (
    !isset($postData['comment']) ||
    !isset($postData['recipe_id']) ||
    !is_numeric($postData['recipe_id'])
) {
    echo('Le commentaire est invalide.');
    return;
}

$comment = trim(strip_tags($postData['comment']));
$recipeId = (int)$postData['recipe_id'];

if ($comment === '') {
    echo 'Le commentaire ne peut pas être vide.';
    return;
}

$insertRecipe = $mysqlClient->prepare('INSERT INTO comments(comment, recipe_id, user_id) VALUES (:comment, :recipe_id, :user_id)');
$insertRecipe->execute([
    'comment' => $comment,
    'recipe_id' => $recipeId,
    'user_id' => $_SESSION['LOGGED_USER']['user_id'],
]);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Création de commentaire</title>
    <link href="style/partage_recettes.css" rel="stylesheet">
</head>
<body class="body_pcreatecom">
    <header>
        <?php require_once(__DIR__ . '/header.php'); ?>
    </header>
    <main>
        <div class="title_pcreatecom">
            <h2>Commentaire ajouté avec succès !</h2>
        </div>
        <section class="section_pcreatecom">
            <div class="form_pcreatecom">
                <div class="formgroup_pcreatecom">
                    <p class="card-text"><b>Votre commentaire</b> : <?php echo strip_tags($comment); ?></p>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <?php require_once(__DIR__ . '/footer.php'); ?>
    </footer>
</body>
</html>
