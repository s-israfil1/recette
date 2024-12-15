<?php
session_start();

require_once(__DIR__ . '/isConnect.php');

/**
 * On ne traite pas les super globales provenant de l'utilisateur directement,
 * ces données doivent être testées et vérifiées.
 */
$getData = $_GET;

if (!isset($getData['id']) || !is_numeric($getData['id'])) {
    echo('Il faut un identifiant pour supprimer la recette.');
    return;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Supprimer la recette ?</title>
    <link href="style/partage_recettes.css" rel="stylesheet">
</head>
<body class="body_delete">
    <header>
        <?php require_once(__DIR__ . '/header.php'); ?>
    </header>

    <main>
        <div class="title_delete">
            <h2>Suprimer la recette ?</h2>
        </div>
        <section class="section_delete">
            <div class="form_delete">
                <form action="recipes_post_delete.php" method="POST">
                    <div class="formgroup_delete">
                        <label for="id"><strong>Identifiant de la recette</strong></label><br>
                        <input type="hidden" id="id" name="id" value="<?php echo $getData['id']; ?>">
                    </div>
                    <div class="formgroup_delete">
                        <button type="submit" class="bouton_delete">La suppression est définitive</button>
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
