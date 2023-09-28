<?php
require_once '../config/modelsConfig.php';
require_once '../app/Controllers/ShowCategoryController.php';

if(isset($_GET['category'])) {
    $showCategoryController = new ShowCategory($User, $Recipe, $Category);
    $categoryName = $Category->getNameById($_GET['category']);
    $recipes = $showCategoryController->getAllRecipesByCategory($_GET['category']);

    for($i = 0; $i < count($recipes); $i++){
        $recipes[$i]['user'] = $User->getUsernameById($recipes[$i]['user_id']);
    }

    var_dump($recipes);

    $expiryTime = time() + 3600;  // Expire em 1 hora
    setcookie('recipes', json_encode($recipes), $expiryTime, '/');
    setcookie('category', $categoryName, $expiryTime, '/');
    header("Location: ../views/ShowCategoryView.php"); 
    exit();
} else {
    echo $_GET['category'];
}
exit();
?>
