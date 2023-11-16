<?php
require_once '../config/modelsConfig.php';

$recipes = $Recipe->getAllRecipe();

for($i = 0; $i < count($recipes); $i++){
    $recipes[$i]['user'] = $User->getUsernameById($recipes[$i]['user_id']);
}


$expiryTime = time() + 3600;  // Expire em 1 hora
setcookie('recipes', json_encode($recipes), $expiryTime, '/');

echo $_COOKIE['recipes'];

header("Location: ../views/HomeView.php"); 
exit();
?>
