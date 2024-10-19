<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Footer</title>
    <link href="style/partage_recettes.css" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="nav_header">
            <div class="logo_head">
                <h1><span>S</span>AVEURS <span>D</span>U <span>M</span>ONDE</h1>
            </div>
            <div class="lien_header" id="navbarSupportedContent">
                
                <div>
                    <a class="liennav" aria-current="page" href="index.php">Home</a>
                </div>
                <div >
                    <a class="liennav" href="contact.php">Contact</a>
                </div>
                <?php if (isset($_SESSION['LOGGED_USER'])) : ?>
                    <div>
                        <a class="liennav" href="recipes_create.php">Ajoutez une recette !</a>
                    </div>
                    <div>
                        <a class="liendecnav" href="logout.php">Déconnexion</a>
                    </div>
                <?php endif; ?>
                
            </div>
            
        </nav>
    </header>
</body>
</html>
