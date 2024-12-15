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
    <title>Patisseries</title>
</head>
<body class="body_cat">
<header>
        <?php require_once(__DIR__ . '/header.php'); ?>
    </header>
    <main>
        <section class="section_cat1">
            <header>
                <?php require_once(__DIR__ . '/header.php'); ?>
            </header>
            <div class="title_cat">
                <h2>Patisseries</h2>
            </div>
            <div class="txt_cat1">
                <p>
                    <span>B</span>ienvenue dans notre douce section Pâtisserie ! 🍰🥐
                </p>
            </div>
            <div class="txt_cat2">
                <p>
                    Nous sommes ravis de vous accueillir dans le monde délicieux des desserts et des douceurs. 
                    Que vous soyez un pâtissier en herbe ou un expert en sucreries, vous trouverez ici une multitude 
                    de recettes pour satisfaire toutes vos envies sucrées !
                </p>
            </div>
        </section>
        <section class="section_cat2">
            <div class="boite_cat">
                <?php foreach (getRecipes($patisserierecipes) as $recipe) : ?>
                    <article class="article_cat">
                        <div class="title_recipe">
                            <h3><a class="trecipe" href="recipes_read.php?id=<?php echo($recipe['recipe_id']); ?>"><?php echo($recipe['title']); ?></a></h3>
                        </div>
                        <div class="recipe"><?php echo $recipe['origin']; ?></div>
                        <div class="author_recipe">
                            <i><?php echo displayAuthor($recipe['author'], $users); ?></i>
                        </div>
                        <?php if (isset($_SESSION['LOGGED_USER']) && $recipe['author'] === $_SESSION['LOGGED_USER']['email']) : ?>
                            <div class="action_recipe">
                                <div class="formgroup_cat">
                                    <a class="bouton_edit1" href="recipes_update.php?id=<?php echo($recipe['recipe_id']); ?>">Modifier Recette</a>
                                </div>
                                <div class="formgroup_cat">
                                    <a class="bouton_edit2" href="recipes_delete.php?id=<?php echo($recipe['recipe_id']); ?>">Supprimer Recette</a>
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