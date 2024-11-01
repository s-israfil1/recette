<?php

// Récupération des variables à l'aide du client MySQL
$usersStatement = $mysqlClient->prepare('SELECT * FROM users');
$usersStatement->execute();
$users = $usersStatement->fetchAll();

$recipesStatement = $mysqlClient->prepare('SELECT * FROM recipes WHERE is_enabled is TRUE');
$recipesStatement->execute();
$recipes = $recipesStatement->fetchAll();


$africanrecipesStatement = $mysqlClient->prepare("SELECT * FROM recipes WHERE is_enabled is TRUE AND category = 'africain' ");
$africanrecipesStatement->execute();
$africanrecipes = $africanrecipesStatement->fetchAll();


$veganerecipesStatement = $mysqlClient->prepare("SELECT * FROM recipes WHERE is_enabled is TRUE AND category = 'vegane' ");
$veganerecipesStatement->execute();
$veganerecipes = $veganerecipesStatement->fetchAll();


$occidentalrecipesStatement = $mysqlClient->prepare("SELECT * FROM recipes WHERE is_enabled is TRUE AND category = 'occidental' ");
$occidentalrecipesStatement->execute();
$occidentalrecipes = $occidentalrecipesStatement->fetchAll();


$asiatiquerecipesStatement = $mysqlClient->prepare("SELECT * FROM recipes WHERE is_enabled is TRUE AND category = 'asiatique' ");
$asiatiquerecipesStatement->execute();
$asiatiquerecipes = $asiatiquerecipesStatement->fetchAll();


$orientalrecipesStatement = $mysqlClient->prepare("SELECT * FROM recipes WHERE is_enabled is TRUE AND category = 'oriental' ");
$orientalrecipesStatement->execute();
$orientalrecipes = $orientalrecipesStatement->fetchAll();


$patisserierecipesStatement = $mysqlClient->prepare("SELECT * FROM recipes WHERE is_enabled is TRUE AND category = 'patisserie' ");
$patisserierecipesStatement->execute();
$patisserierecipes = $patisserierecipesStatement->fetchAll();