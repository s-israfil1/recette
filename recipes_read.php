<?php
session_start();

require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');

/**
 * On ne traite pas les super globales provenant de l'utilisateur directement,
 * ces données doivent être testées et vérifiées.
 */
$getData = $_GET;

if (!isset($getData['id']) || !is_numeric($getData['id'])) {
    echo('La recette n\'existe pas');
    return;
}

// On récupère la recette
$retrieveRecipeWithCommentsStatement = $mysqlClient->prepare('SELECT r.*, c.comment_id, c.comment, c.user_id, u.full_name FROM recipes r 
LEFT JOIN comments c on c.recipe_id = r.recipe_id
LEFT JOIN users u ON u.user_id = c.user_id
WHERE r.recipe_id = :id ');
$retrieveRecipeWithCommentsStatement->execute([
    'id' => (int)$getData['id'],
]);
$recipeWithComments = $retrieveRecipeWithCommentsStatement->fetchAll(PDO::FETCH_ASSOC);

if ($recipeWithComments === []) {
    echo('La recette n\'existe pas');
    return;
}

$recipe = [
    'recipe_id' => $recipeWithComments[0]['recipe_id'],
    'title' => $recipeWithComments[0]['title'],
    'origin' => $recipeWithComments[0]['origin'],
    'recipe' => $recipeWithComments[0]['recipe'],
    'image' => $recipeWithComments[0]['image'],
    'author' => $recipeWithComments[0]['author'],
    'comments' => [],
];

foreach ($recipeWithComments as $comment) {
    if (!is_null($comment['comment_id'])) {
        $recipe['comments'][] = [
            'comment_id' => $comment['comment_id'],
            'comment' => $comment['comment'],
            'user_id' => (int) $comment['user_id'],
            'full_name' => $comment['full_name']
        ];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Recette<?php echo($recipe['title']); ?></title>
    <link href="style/partage_recettes.css" rel="stylesheet">
</head>
<body class="body_recread">
    <header>
        <?php require_once(__DIR__ . '/header.php'); ?>
    </header>
    <main>
        <div class="title_recread1">
            <h2><?php echo($recipe['title']); ?></h2>
        </div>
        <section class="section_recread0">
            <article>
                <?php 
                $image_name = $recipe['image'];
                $image_path = 'uploads/' . $image_name;
                
                ?>
                <img src="<?php echo htmlspecialchars($image_path); ?>"/>
            </article>
            <article>
                <?php echo($recipe['origin']); ?>
            </article>
        </section>
        <section class="section_recread1">
            <div class="boite_recread1">
                <article class="formgroup_recread">
                    <?php echo($recipe['recipe']); ?>
                </article>
                <aside class="formgroup_recread">
                    <p><i>Contribuée par <?php echo($recipe['author']); ?></i></p>
                </aside>
            </div>
        </section>
        <section class="section_recread2">
            <div>
                <p>
                    Pour nous contacter, cliquez sur le lien ci-dessous :
                </p>
            </div>
            <div>
                <a href="mailto:<?php echo($recipe['author']); ?>?subject=Partage de recette&body=Bonjour,%0A%0A">
                    Envoyer un  email
                </a>
            </div>
        </section>
        <section class="section_recread2">
            <div class="title_recread2">
                <h3>COMMENTAIRES...</h3>
            </div>
            <div class="boite_recread2">
                <?php if ($recipe['comments'] !== []) : ?>
                <div class="boite_recread3">
                    <?php foreach ($recipe['comments'] as $comment) : ?>
                        <ul>
                            <li>
                                <div class="commentaire">
                                <p><?php echo $comment['comment']; ?></p>
                                <i>(<?php echo $comment['full_name']; ?>)</i>
                                </div>
                            </li>
                        </ul>
                    <?php endforeach; ?>
                </div>
                <?php else : ?>
                <ul>
                    <li>
                        <p class="alt_comm">Aucun commentaire</p>
                    </li>
                </ul>
                <?php endif; ?>
            </div>
        </section>
        <section class="section_recread3">
            <?php if (isset($_SESSION['LOGGED_USER'])) : ?>
                        <?php require_once(__DIR__ . '/comments_create.php'); ?>
                    <?php endif; ?>
            </section>
    </main>
    <footer>
        <?php require_once(__DIR__ . '/footer.php'); ?>
    </footer>
</body>
</html>
