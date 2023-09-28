<?php


require_once '../config/modelsConfig.php';
require_once '../app/Controllers/ProfileController.php';

$profileController = new ProfileController($User, $Recipe, $Ingredient);

$recipes = $profileController->listUserRecipes($_COOKIE['auth_token']);


var_dump($recipes);

$expiryTime = time() + 3600;  // Expire em 1 hora
setcookie('recipes', json_encode($recipes), $expiryTime, '/');

header("Location: ../views/ProfileView.php"); 
exit();
?>
