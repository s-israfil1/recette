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
    <title>Manage Recipes</title>
    <link href="style/admin.css" rel="stylesheet">
</head>
<body>
    <header class="head_manrec">
        <?php require_once(__DIR__ . '/headmin.php'); ?>
    </header>
    <main>
        <section class="section1_manrec">
            <h2>RECETTES</h2>
        </section>
        <section class="section2_manrec">
            <table style="width: 100%;" class="table_manrec">
                <tr class="th_manrec">
                    <th style="width: 6%;">ID</th>
                    <th style="width: 23%;">Title</th>
                    <th style="width: 23.6%;">Author</th>
                    <th style="width: 13.6%;">Category</th>
                    <th style="width: 36.6%;">Actions</th>
                </tr>
                    <?php foreach ($recipes as $recipe) : ?>
                        <tr>
                            <td class="ta_manrec"><?php echo $recipe['recipe_id'] ?></td>
                            <td class="ta_manrec"><?php echo $recipe['title'] ?></td>
                            <td class="ta_manrec"><?php echo $recipe['author'] ?></td>
                            <td class="ta_manrec"><?php echo $recipe['category'] ?></td>
                            <td class="tdact_manrec">    
                                <a href="edRec.php?id=<?php echo $recipe['recipe_id'];?>" class="lact1_manrec">Modifier Recette</a>
                                <a href="delRec.php?id=<?php echo $recipe['recipe_id'];?>" class="lact2_manrec" title="La suppression est définitive">Suprimer Recette</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
            </table> 
        </section>
    </main>
    <footer>  
        <?php require_once(__DIR__ . '/footer.php'); ?>
    </footer>
</body>
</html>