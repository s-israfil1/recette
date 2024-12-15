<!DOCTYPE html>
<html lang="fr"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Header admin</title>
    <!-- <link href="style/partage_recettes.css" rel="stylesheet">    -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kablammo&display=swap" rel="stylesheet">
</head>
<body>
    <header  id="hh">
        <nav class="nav_header">
            <div class="logo_head">
                <h1><span>S</span>AVEURS <span>D</span>U <span>M</span>ONDE</h1>
            </div>
            <div class="lien_header" id="navbarSupportedContent">
                
                <div>
                    <a class="liennav" aria-current="page" href="landing.php">Accueil</a>
                </div>

                <?php if (isset($_SESSION['LOGGED_USER'])) : ?>
                    <div>
                        <a class="liendecnav" href="login.php">Déconnexion</a>
                    </div>
                <?php endif; ?>
                
            </div>
            
        </nav>
    </header>
</body>
</html>

<style>
    #hh .nav_header {
    /* background-color: rgb(48, 48, 63); */
    display: flex;
    justify-content: space-between;
    padding: 36px 20px 26px 20px;
}
.logo_head {
    font-family: Kablammo;
    font-size: 1.6em;
    /*background-color: green;*/
    text-align: center;
    width: 43.6%;
    padding: 6px 0px 26px 0px;
}

.lien_header {
    /*background-color: violet;*/
    display: flex;
    justify-content: space-around;
    width: 53.6%;
    padding: 26px 0px 26px 0px;
}
.liennav {
    color: white;
    background-color: rgb(15, 63, 63);
    font-size: 1.16em;
    text-decoration: none;
    margin-top: 26px;
    padding: 10px 16.6px 10px 16.6px;
    border-radius: 16px 16px 16px 16px;
    border: 1.6px solid white;
}

.liendecnav {
    color: white;
    background-color: rgb(15, 63, 63);
    font-size: 1.16em;
    text-decoration: none;
    margin-top: 26px;
    padding: 10px 16.6px 10px 16.6px;
    border-radius: 16px;
    border: 1.6px solid red;
}


</style>