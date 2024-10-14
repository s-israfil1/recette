<?php
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');
require_once(__DIR__ . '/variables.php');
require_once(__DIR__ . '/functions.php');
require_once(__DIR__ . '/login.php');

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

//verifier si l'utilisateur existe deja
$sqlQuery = 'SELECT * FROM users WHERE Email '= $email;

// requette de preparation et execution de requette d'insertion
$sqlQuery = 'INSERT INTO users(full_name, email, password, age) VALUES (:full_name, :email, :password, :age)';

//preparation
$insertInfo = $mysqlClient->prepare($sqlQuery);

//binding parameter
$insertInfo-> bindParam(':full_name', $username);
$insertInfo-> bindParam(':email', $email);
$insertInfo-> bindParam(':password', $hashed_password);
$insertInfo-> bindParam(':age', $age);

//execution
if($insertInfo->execute()) {
    echo "Inscription réussie !";

    //redirection sur le page de connection
    redirectToUrl('login.php');
}

?>