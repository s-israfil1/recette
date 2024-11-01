<?php 

session_start();
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');
require_once(__DIR__ . '/variables.php');
require_once(__DIR__ . '/functions.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oriental</title>
</head>
<body>
<header>
        <?php require_once(__DIR__ . '/header.php'); ?>
    </header>
    <main>
        <section>
            <h2>recettes Oriental</h2>
        </section>
        <section>
            <div class="boite_index1">
                <?php foreach (getRecipes($orientalrecipes) as $recipe) : ?>
                    <article class="article_index">
                        <div class="title_recipe">
                            <h3><a class="trecipe" href="recipes_read.php?id=<?php echo($recipe['recipe_id']); ?>"><?php echo($recipe['title']); ?></a></h3>
                        </div>
                        <div class="recipe"><?php echo $recipe['recipe']; ?></div>
                        <div class="author_recipe">
                            <i><?php echo displayAuthor($recipe['author'], $users); ?></i>
                        </div>
                        <?php if (isset($_SESSION['LOGGED_USER']) && $recipe['author'] === $_SESSION['LOGGED_USER']['email']) : ?>
                            <div class="action_recipe">
                                <div class="formgroup_index">
                                    <a class="bouton_edit1" href="recipes_update.php?id=<?php echo($recipe['recipe_id']); ?>">Modifier l'article</a>
                                </div>
                                <div class="formgroup_index">
                                    <a class="bouton_edit2" href="recipes_delete.php?id=<?php echo($recipe['recipe_id']); ?>">Supprimer l'article</a>
                                </div>
                            </div>
                        <?php endif; ?>
                    </article>
                <?php endforeach ?>
            </div>
        </section>
    </main>
    <footer>
        <?php require_once(__DIR__ . '/footer.php'); ?>
    </footer>
</body>
</html>