<?php
require_once(__DIR__ . '/isConnect.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Comment create</title>
    <link href="style/partage_recettes.css" rel="stylesheet">
</head>
<body>
    <section class="section_comcreate">
        <div class="form_comcreate">
            <form action="comments_post_create.php" method="POST">
                <div>
                    <input type="hidden" name="recipe_id" value="<?php echo($recipe['recipe_id']); ?>" />
                </div>
                <div class="formroup_comcreate">
                    <label for="comment">Laissez un commentaire...</label><br>
                    <textarea class="textera_comcreate" placeholder="Soyez respectueux/se, nous sommes humain(e)s." id="comment" name="comment" required></textarea>
                </div>
                <div class="formroup_comcreate">
                    <button type="submit" class="bouton_comcreate">Poster</button>
                </div>
            </form>
        </div>
    </section>
</body>
</html>
