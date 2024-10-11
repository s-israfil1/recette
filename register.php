<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSCRIPTION</title>
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- inclusion de l'entête du site -->
    <?php require_once(__DIR__ . '/header.php'); ?>

    <div>

    </div>

    <div>
        <form action="submit_register.php" method="POST">
            <div>
                <label for="full_name" class="form-label">Nom</label>
                <input type="text" class="form-control" id="full_name" name="full_name" placeholder="ex: francis nganou" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help" placeholder="you@exemple.com" required>
                <div id="email-help" class="form-text">L'email avec lequel vous allez vous conecter.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirmer le mot de passe</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>
            <div>
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age" name="age" min="18" required>
            </div>

            <button type="submit" class="btn btn-primary">S'INSCRIRE</button>
        </form>
    </div>
</body>
    <!-- inclusion du bas de page du site -->
    <?php require_once(__DIR__ . '/footer.php'); ?>
</html>
