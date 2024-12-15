<?php

session_start();

require_once(__DIR__ . '/isConnect.php');
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');
require_once(__DIR__ . '/functions.php');


/**
* On ne traite pas les super globales provenant de l'utilisateur directement,
* ces données doivent être testées et vérifiées.
*/


// recuperer l'id pour utiliser les info
$getData = $_GET;  

if (!isset($getData['id']) || !is_numeric($getData['id'])) {
    echo 'Il faut un identifiant valide pour supprimer un utilisateur.';
    return;
}

// on prepare les recettes
$recipeStmt = $mysqlClient->prepare('SELECT * FROM recipes WHERE recipe_id = :id');

//on execute la requette
$recipeStmt->execute([
    'id' => (int)$getData['id'],
]);

// on recupere la recette en bd
$recipe = $recipeStmt->fetch(PDO::FETCH_ASSOC);

if (!$recipe) {
    echo "recipe not found.";
    exit;
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the new title from the form
    $newTitle = $_POST['title'];
    $newAuthor = $_POST['author'];
    $newCategory = $_POST['category'];
    $newOrigin= $_POST['origin'];
    $newRecipe = $_POST['recipe'];

    // Update the recipe in the database
    $updateStmt = $mysqlClient->prepare('UPDATE recipes SET title = :title, author = :author, category = :category, origin = :origin, recipe = :recipe WHERE recipe_id = :id');
    $updateStmt->execute([
        'title' => $newTitle,
        'author' => $newAuthor,
        'category' => $newCategory,
        'origin' => $newOrigin,
        'recipe' => $newRecipe,
        'id' => (int)$getData['id']
    ]);

    redirectToUrl('manrec.php');
}

// Display the form
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Recipe</title>
    <link href="style/admin.css" rel="stylesheet">
</head>
<body>
    <header class="head_edRec">
        <?php require_once(__DIR__ . '/headmin.php'); ?>
    </header>
    <main>
        <section class="section1_edRec">
            <h3>Mettre à jour : <?php echo htmlspecialchars($recipe['title']); ?></h3>
        </section>
        <section class="section2_edRec">
            <div class="boite_edRec">
                <form method="POST">
                    <div class="formgroup_edRec">
                        <label for="title">Titre de la recette:</label><br>
                        <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($recipe['title']); ?>" class="champs_edRec" required />
                    </div>
                    <div class="formgroup_edRec">
                        <label for="author">Autheur:</label><br>
                        <input type="email" name="author" id="author" value="<?php echo htmlspecialchars($recipe['author']); ?>" class="champs_edRec" required />
                    </div>
                    <div class="formgroup_edRec">
                        <label for="title" >Category</label><br>
                        <select name="category" id="category" class="select_edRec" value="<?php echo($recipe['category']); ?>">
                            <option value="africain">Africain</option>
                            <option value="oriental">Oriental</option>
                            <option value="occidental">Occidental</option>
                            <option value="vegane">Végane</option>
                            <option value="asiatique">Asiatique</option>
                            <option value="patisserie">Patisserie</option>
                        </select>
                        <div id="select-help" class="baschamps" class="baschamps">Veillez choisir une category !</div>
                    </div>
                    <div class="formgroup_edRec">
                        <label for="origin">Origin:</label><br>
                        <textarea name="origin" class="textera_edRec1" id="origin" required><?php echo htmlspecialchars($recipe['origin']); ?></textarea>
                    </div>
                    <div class="formgroup_edRec">
                        <label for="recipe">Recette:</label><br>
                        <textarea name="recipe" class="textera_edRec2" id="recipe" required><?php echo htmlspecialchars($recipe['recipe']); ?></textarea>
                    </div>
                    <div class="formgroup_edRec">
                        <button type="submit" class="bouton_edRec">Mettre à jour</button>
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