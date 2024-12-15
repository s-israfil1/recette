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
        <div class="alert alert-success" role="alert" style="background-color: white; padding:10px;width:fit-content;margin:auto; border-radius: 1px;font-size:large;font-weight:600">
            <?php if (isset($_SESSION['LOGGED_USER']['email'])) : ?>
                Bonjour <?php echo $_SESSION['LOGGED_USER']['email']; ?> et bienvenue sur le site !
            <?php endif; ?>
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
                <div class="rejoindre">
                    <a href="register.php" class="lrejoindre" title="Cliquez pour nous rejoindre">Allez Rejoinez-nous !</a>
                </div>
            </div>
        </section>
        <div class="dsec_index">
            <div class="title_index1">
                <h2>NOTRE SELECTION</h2>
            </div>
            <div class="txt_index2">
                <p>
                    Retrouvez les dernières créations de nos Chefs étoilée, ainsi que notre sélection
                    parmi les dernières recettes partagées par la communauté.
                </p>
            </div>
        </div>
        <section class="section_index0">

            <div class="boite_index">
                <div class="lienind">
                    <a href="africain.php"><img src="images/africa.png" class="lienindex" alt="africa" title="cliquez pour acceder"></a>
                </div>
                <div class="h_lienind">
                    <p>Recettes Africaine</p>
                </div>
            </div>

            <div class="boite_index">
                <div class="lienind">
                    <a href="vegane.php"><img src="images/vegan.png" class="lienindex" alt="vegane" title="cliquez pour acceder"></a>
                </div>
                <div class="h_lienind">
                    <p>Recettes Végane</p>
                </div>
            </div>
            <div class="boite_index">
                <div class="lienind">
                    <a href="asiatique.php"><img src="images/torii.png" class="lienindex" alt="asiatique" title="cliquez pour acceder"></a>
                </div>
                <div class="h_lienind">
                    <p>Recettes Asiatique</p>
                </div>
            </div>
            <div class="boite_index">
                <div class="lienind">
                    <a href="oriental.php"><img src="images/oriental.png" class="lienindex" alt="orient" title="cliquez pour acceder"></a>
                </div>
                <div class="h_lienind">
                    <p> Recettes Orientale</p>
                </div>
            </div>
            <div class="boite_index">
                <div class="lienind">
                    <a href="occidental.php"><img src="images/occidental.png" alt="occident" title="cliquez pour acceder" class="lienindex"></a>
                </div>
                <div class="h_lienind">
                    <p>Recettes Occidentale</p>
                </div>
            </div>

            <div class="boite_index">
                <div class="lienind">
                    <a href="patisserie.php"><img src="images/bakery.png" class="lienindex" alt="patisserie" title="cliquez pour acceder"></a>
                </div>
                <div class="h_lienind">
                    <p>Patisseries</p>
                </div>
            </div>
        </section>

        <div class="title_index2">
            <h2>Liste des <span>R</span>eccettes</h2>
        </div>

        <section class="section_index2">
            <div class="boite_cat">
                <?php foreach (getRecipes($recipes) as $recipe) : ?>
                    <article class="article_cat">
                        <div class="title_recipe">
                            <h3><a class="trecipe" href="recipes_read.php?id=<?php echo ($recipe['recipe_id']); ?>"><?php echo ($recipe['title']); ?></a></h3>
                        </div>
                        <div class="recipe"><?php echo $recipe['origin']; ?></div>
                        <div class="author_recipe">
                            <i><?php echo displayAuthor($recipe['author'], $users); ?></i>
                        </div>
                        <?php if (isset($_SESSION['LOGGED_USER']) && $recipe['author'] === $_SESSION['LOGGED_USER']['email']) : ?>
                            <div class="action_recipe">
                                <div class="formgroup_cat">
                                    <a class="bouton_edit1" href="recipes_update.php?id=<?php echo ($recipe['recipe_id']); ?>">Modifier Recette</a>
                                </div>
                                <div class="formgroup_cat">
                                    <a class="bouton_edit2" href="recipes_delete.php?id=<?php echo ($recipe['recipe_id']); ?>">Supprimer Recette</a>
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
