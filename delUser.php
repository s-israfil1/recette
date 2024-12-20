<?php

session_start();

require_once(__DIR__ . '/isConnect.php');
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');
require_once(__DIR__ . '/functions.php');

/**
 * On ne traite pas les super globales provenant de l'utilisateur directement,
 * ces données doivent être testées et vérifiées.
 */

$getData = $_GET;

if (!isset($getData['id']) || !is_numeric($getData['id'])) {
    echo 'Il faut un identifiant valide pour supprimer un utilisateur.';
    return;
}

$deleteUserStatement = $mysqlClient->prepare('DELETE FROM users WHERE user_id = :id');
$deleteUserStatement->execute([
    'id' => (int)$getData['id'],
]);

redirectToUrl('manuser.php');
