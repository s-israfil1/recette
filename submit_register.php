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
if($password !== $comfirm_password) {
    die("<p style='color:red;background-color:white;padding:16px;border: 2.6px solid red;font-size: 1.26em;'>les mots de passe ne correspondent pas VEILLEZ VOUS REINSCRIRE !</p>");
}

//hachage du mot de passe
$hashed_password= password_hash($password, PASSWORD_DEFAULT);

//verifier si l'utilisateur existe deja
$sqlQuery = 'SELECT * FROM users WHERE email = :email';
$selectUserByEmail = $mysqlClient->prepare($sqlQuery);
$selectUserByEmail->bindParam(':email', $email);
$selectUserByEmail->execute();
$user = $selectUserByEmail->fetch(PDO::FETCH_ASSOC);


if(!$user){

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
}else {
    echo "<p style='color:red;background-color:white;padding:16px;border: 2.6px solid red; font-size: 1.26em;'>L'utilisateur existe déjà !</p>";
}

?>
