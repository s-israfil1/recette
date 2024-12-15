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
    <title>Document</title>
    <link href="style/admin.css" rel="stylesheet">
</head>
<body>
    <header class="head_land">
        <?php require_once(__DIR__ . '/headmin.php'); ?>
    </header>
    <main>
        <section class="section1_land">
            <div class="title_land">
                <h2>ADMIN / DASHBOARD</h3>
            </div>
        </section>
        <section class="section2_land">
            <div class="boite_land">
                <div class="logo_man">
                    <a href="manuser.php"><img src="images/people.png" title="cliquez pour acceder" alt="manuser"></a>
                </div>
                <div class="txt_logoman">
                    <p>Manage USERS</p>
                </div>
            </div>
            <div class="boite_land">
                <div class="logo_man">
                    <a href="manrec.php"><img src="images/recipe.png" title="cliquez pour acceder" alt="manrec"></a>
                </div>
                <div class="txt_logoman">
                    <p>Manage RECIPES</p>
                </div>
            </div>
            <div class="boite_land">
                <div class="logo_man">
                    <a href="mancom.php"><img src="images/chat.png" title="cliquez pour acceder" alt="mancom"></a>
                </div>
                <div class="txt_logoman">
                    <p>Manage COMMENTS</p>
                </div>
            </div>
        </section>
        <hr> 
    </main>
    <footer>
        <?php require_once(__DIR__ . '/footer.php'); ?>
    </footer>
</body>
</html>
