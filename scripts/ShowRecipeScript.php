<?php


require_once '../config/modelsConfig.php';
require_once '../app/Controllers/ShowRecipeController.php';

if(isset($_GET['recipeID'])) {
    $recipeID = $_GET['recipeID'];
    $showRecipeController = new ShowRecipeController($Recipe, $Ingredient);

    $recipe = $showRecipeController->getRecipeById($recipeID);
    $ingredients = $showRecipeController->getIngredientsByRecipeId($recipeID);

    
    $expiryTime = time() + 3600;  // Expire em 1 hora
    setcookie('recipe', json_encode($recipe), $expiryTime, '/');
    setcookie('ingredients', json_encode($ingredients), $expiryTime, '/');
    header("Location: ../views/ShowRecipeView.php");

    echo $_COOKIE['recipe'];
    echo $_COOKIE['ingredients'];
} else {
    echo 'ID da receita não foi especificado.';
}
exit();
?>
