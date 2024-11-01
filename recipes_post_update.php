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
$currTime = time();

//testons si le fichier a bien ete envoye et d'erreur

if(isset($_FILES['imageToUpload'])) {
    
    //testons si le fichier n'est pas troip gros
    if($_FILES['imageToUpload']['size'] <= 10000000000) {

        // testons si l'extension est authorisee
        $fileinfo = pathinfo($_FILES['imageToUpload']['name']);
        $extension = $fileinfo['extension'];
        $allowedExtension = ['jpg', 'jpeg', 'gif', 'png'];

        if(!in_array($extension, $allowedExtension)) {
            echo "l'extension n'est pas autoriser";
        } else {
            //on peut valider le fichier et le stocker definitivement
            move_uploaded_file($_FILES['imageToUpload']['tmp_name'], 'uploads/'  . strval($currTime). basename($_FILES['imageToUpload']['name']));    
        }
    }
}

//strval($currenttime = comme en haut et dans les ligne c'est pour donner une temps unique pour aue le meme fichier soit envoyer sans etre ecraser )

// Vérification du formulaire soumis
if (
    !isset($postData['id'])
    || !is_numeric($postData['id'])
    || empty($postData['title'])
    || empty($postData['recipe'])
    || trim(strip_tags($postData['title'])) === ''
    || trim(strip_tags($postData['recipe'])) === ''
) {
    echo 'Il manque des informations pour permettre l\'édition du formulaire.';
    return;
}

$id = (int)$postData['id'];
$title = trim(strip_tags($postData['title']));
$oldImage = trim(strip_tags($postData['oldImage']));
$recipe = trim(strip_tags($postData['recipe']));
$category = trim(strip_tags($postData['category']));
$origin = trim(strip_tags($postData['origin']));
if ($_FILES['imageToUpload']){
    $image = strval($currTime) . trim(strip_tags($_FILES['imageToUpload']['name']));
    /*if (isset($oldImage)) {
        $uploadDir= 'upload/'
        $destPath = 
    }*/
}else{
    $image = $oldImage;
}

//faire le changement en base de donnee
$insertRecipeStatement = $mysqlClient->prepare('UPDATE recipes SET title = :title, category = :category, origin = :origin, image = :image, recipe = :recipe WHERE recipe_id = :id');
$insertRecipeStatement->execute([
    'title' => $title,
    'category' => $category,
    'origin' => $origin,
    'image' => $image,
    'recipe' => $recipe,
    'id' => $id,
]);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Création de recette</title>
    <link href="style/partage_recettes.css" rel="stylesheet">
</head>
<body class="body_postupdate">
    <header>
        <?php require_once(__DIR__ . '/header.php'); ?>
    </header>
    <main>
        <div class="title_postupdate">
            <!-- MESSAGE DE SUCCES -->
            <h2>Recette modifiée avec succès !</h2>
        </div>
        <section class="section_postupdate">
            <div class="boite_postupdate">
                <ul>
                    <li><h5><em><?php echo($title); ?></em></h5></li>
                </ul>
                <div class="">
                    <p class="txt_postupdate"><b>Email</b> : <?php echo $_SESSION['LOGGED_USER']['email']; ?></p>
                    <p class="txt_postupdate"><b>Recette</b> : <?php echo $recipe; ?></p>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <?php require_once(__DIR__ . '/footer.php'); ?>
    </footer>
    
</body>
</html>
