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
    <title>Manage Comments</title>
    <link href="style/admin.css" rel="stylesheet">
</head>
<body>
    <header class="head_mancom">
        <?php require_once(__DIR__ . '/headmin.php'); ?>
    </header>
    <main>
        <section class="section1_mancom">
            <h2>COMMENTAIRES</h2>
        </section>
        <section class="section2_mancom">
            <table style="width: 100%;" class="table_mancom">
                <tr class="th_mancom">
                    <th style="width: 16%;">ID</th>
                    <th style="width: 36%;">Commentaire</th>
                    <th style="width: 36%;">Action</th>
                </tr>
                    <?php foreach ($comments as $comment) : ?>
                        <tr>
                            <td class="ta_mancom"><?php echo $comment['comment_id'] ?></td>
                            <td class="ta_mancom"><?php echo $comment['comment'] ?></td>
                            <td class="tdact_mancom">
                                <a href="delCom.php?id=<?php echo $comment['comment_id'];?>" class="lact_mancom" title="La suppression est définitive">Suprimer Commentaire</a>
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