<?php
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');
require_once(__DIR__ . '/variables.php');
require_once(__DIR__ . '/functions.php');
require_once(__DIR__ . '/login.php');

/**
* On ne traite pas les super globales provenant de l'utilisateur directement,
* ces données doivent être testées et vérifiées.
*/
/*
//nom du serveur
$servername = 'localhost';
$username ='full_name';
$email = 'email';
$password ='password';
$age = 'age';
//nom de la base de donnee
$dbname = 'partage_de_recettes';
//creer la connexion
$conn = new $mysqlClient($servername,$email,$password, $dbname);
//verifier la connexion
if($conn->connect_error) {
    die('Echec de la connexion: ' . $conn->connect_error);
}
*/

try {
    $mysqlClient = new PDO('msql:host=localhost;dbname=partage_de_recettes;charset=utf8', 'root', 'root');
} catch(Exception $e) {
    die('Erreur: ' . $e->getMessage());
}

$postData = $_POST;

//recuperer les donnees du formulaire
$username =$_POST['full_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$comfirm_password = $_POST['confirm_password'];
$age = $_POST['age'];

//validation simple
if($password !==$comfirm_password) {
    die('les mots de passe ne correspondent pas !');
}

//hachage du mot de passe
$hashed_password= password_hash($password, PASSWORD_DEFAULT);

//preparation et execution de requette d'insertion
$sqlQuery = 'INSERT INTO users(full_name, email, password, age) VALUES (:full_name, :email, :password, :age)';

//prepa
$insertInfo = $mysqlClient->prepare($sqlQuery);

//execution
if ($insertInfo->execute()) {
    echo "Inscription réussie !";

    //redirection sur le page de connection
    redirectToUrl('login.php');
}

/*
if($stmt->execute()){
    echo 'Insription réussie !';
} else {
    echo 'Erreur : ' . $stmt->error;

    //Fermeture des connexions
    $stmt->close();
    $conn->close();
}
*/
  
?>