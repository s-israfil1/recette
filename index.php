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
    <header>
        <!-- inclusion de l'entête du site -->
        <?php require_once(__DIR__ . '/header.php'); ?>
    </header>
    <main>
        <div>
            <!-- Formulaire de connexion -->
            <?php require(__DIR__ . '/login.php'); ?>
        </div>
        <section class="section_index1">
            <div class="txt_index1">
                <p>
                    Transformez votre cuisine en un veritable laboratoire culinaire avec votre livre
                    de recette numerique et découvrez des recettes du monde entier.
                </p>
                <p>
                    Des plats simples aux chefs-d'oeuvre gastronomiques, trouvez la recette parfaite
                    pour chaque occasion.
                </p>
                <p>
                    Inspirez-vous, apprenez, laissez libre cours à votre créativité et partagez vos 
                    chefs-d'oeuvre.
                </p>
                <p>
                    La cuisine n'a jamais été aussi facile !
                </p>
            </div>
        </section>
        <section class="section_index0">
            <div class="title_index">
                <h2>NOTRE SELECTION</h2>
            </div>
            <div class="txt_index2">
                <p>
                    Retrouvez les dernières créations de nos Chefs étoilée, ainsi que notre sélection 
                    parmi les dernières recettes partagées par la communauté.
                </p>
            </div>
            <div class="boite_index0">
                <div><a href="africain.php" class="lienindex">Africain</a></div>
                <div><a href="oriental.php" class="lienindex">Oriental</a></div>
                <div><a href="vegane.php" class="lienindex">Végane</a></div>
                <div><a href="occidental.php" class="lienindex">Occidental</a></div>
                <div><a href="asiatique.php" class="lienindex">Asiatique</a></div>
                <div><a href="patisserie.php" class="lienindex">Patisseries</a></div>
            </div>
            <div>
                <div><img src="" alt=""></div>
                <div><img src="" alt=""></div>
                <div><img src="" alt=""></div>
                <div><img src="" alt=""></div>
                <div><img src="" alt=""></div>
                <div><img src="" alt=""></div>
                <div><img src="" alt=""></div>
            </div>
        </section>

        <section class="section_index2">
            <div class="boite_index1">
                <?php foreach (getRecipes($recipes) as $recipe) : ?>
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
            <!-- inclusion du bas de page du site -->
        <?php require_once(__DIR__ . '/footer.php'); ?>
    </footer>
</body>
</html>
