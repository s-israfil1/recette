<?php

session_start();

require_once(__DIR__ . '/isConnect.php');
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');
require_once(__DIR__ . '/functions.php');

/**
* On ne traite pas les super globales provenant de l'utilisateur directement,
* ces données doivent être testées et vérifiées.*/

$getData = $_GET;

$userStmt = $mysqlClient->prepare('SELECT * FROM users WHERE user_id = :id');

// Executing the query
$userStmt->execute([
    'id' => (int)$getData['id'],
]);

// Fetching the user data
$user = $userStmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    echo "User not found.";
    exit;
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the new email from the form
    $newfull_name = $_POST['full_name'];
    $newEmail = $_POST['email'];
    $newAge = $_POST['age'];

    // Update the user in the database
    $updateStmt = $mysqlClient->prepare('UPDATE users SET full_name = :full_name, email = :email, age = :age WHERE user_id = :id');
    $updateStmt->execute([
        'full_name' => $newfull_name,
        'email' => $newEmail,
        'age' => $newAge,
        'id' => (int)$getData['id']
    ]);

    redirectToUrl('manuser.php');
}

// Display the form
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="style/admin.css" rel="stylesheet">
</head>
<body>
    <header class="head_edUser">
        <?php require_once(__DIR__ . '/headmin.php'); ?>
    </header>
    <main>
        <section class="section1_edUser">
            <h3>Mettre à jour : <?php echo htmlspecialchars($user['full_name']); ?></h3>
        </section>
        <section class="section2_edUser">
            <div class="boite_edUser">
                <form method="POST">
                    <div class="formgroup_edUser">
                        <label for="full_name">Full Name:</label><br>
                        <input type="text" name="full_name" class="champs_edUser" id="full_name" value="<?php echo htmlspecialchars($user['full_name']); ?>" required />
                    </div>
                    <div class="formgroup_edUser">
                        <label for="email">Email:</label><br>
                        <input type="email" name="email" id="email" class="champs_edUser" value="<?php echo htmlspecialchars($user['email']); ?>" required />
                    </div>
                    <div class="formgroup_edUser">
                        <label for="age">Age</label><br>
                        <input type="number" id="age" name="age" class="champs_edUser" min="18" value="<?php echo htmlspecialchars($user['age']); ?>" required>
                    </div>
                    <div class="formgroup_edUser">
                        <button type="submit" class="bouton_edUser">Mettre à jour</button>
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