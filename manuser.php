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
    <title>Manage users</title>
    <link href="style/admin.css" rel="stylesheet">
</head>
<body>
    <header class="head_manuser">
        <?php require_once(__DIR__ . '/headmin.php'); ?>
    </header>
    <main>
        <section class="section1_manuser">
            <h2>UTILISATEURS</h2>
        </section>
        <section class="section2_manuser">
            <table style="width: 100%;" class="table_manuser">
                <tr class="th_manuser">
                    <th style="width: 6.6%;">ID</th>
                    <th style="width: 23.6%;">full_name</th>
                    <th style="width: 23.6%;">Email</th>
                    <th style="width: 8.6%;">Age</th>
                    <th style="width: 36.6%;">Action</th>
                </tr>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td class="ta_manuser"><?php echo $user['user_id'] ?></td>
                        <td class="ta_manuser"><?php echo $user['full_name'] ?></td>
                        <td class="ta_manuser"><?php echo $user['email'] ?></td>
                        <td class="ta_manuser"><?php echo $user['age'] ?></td>
                        <td class="tdact_manuser">
                            <a href="edUser.php?id=<?php echo $user['user_id'];?>" class="lact1_manuser">Modifier utilisateur</a>
                            <a href="delUser.php?id=<?php echo $user['user_id'];?>" class="lact2_manuser" title="La suppression est définitive">Suprimer utilisateur</a>
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