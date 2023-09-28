<?php

require_once '../app/Controllers/SubmitRecipeController.php';
require_once '../config/modelsConfig.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenha os valores dos campos do formulário
    $recipeName = $_POST['recipeName'];
    $ingredients = json_decode($_POST['ingredientList'], true);
    $instructions = $_POST['instructions'];
    $cookingTime = $_POST['cookingTime'];
    $servingSize = $_POST['servingSize'];
    $category = $_POST['category'];

    
    $username = $_COOKIE['auth_token'];
    $user_id = $User->getIdByUser($username);
    
    
    
    $resultArray = array();
    
    foreach ($ingredients as $ingredient) {
        // Use a função preg_match para extrair o número e a descrição
        if (preg_match('/(\d+)x - (.+)/', $ingredient, $matches)) {
            $number = intval($matches[1]); // Converte o número para inteiro
            $description = $matches[2];
            if(empty(trim($description))){
                $_SESSION['error_message'] = "Descrição do ingrediente é obrigatória";
                header("Location: ../views/SubmitRecipeView.php");
                exit();
            }
            if(!is_numeric($number)){
                $_SESSION['error_message'] = "Número de ingredientes deve ser um número";
                header("Location: ../views/SubmitRecipeView.php");
                exit();
            }
            
            // Cria um subarray com o número e a descrição e adiciona ao resultado
            $resultArray[] = array($number, $description);
        }
    }
    $errorMensage = validations($recipeName, $ingredients, $instructions, $cookingTime, $servingSize, $category);    
    
    if($errorMensage){
        $_SESSION['error_message'] = $errorMensage;
        header("Location: ../views/SubmitRecipeView.php");
        exit();
    }else{
        $submitRecipeController = new SubmitRecipeController($Recipe);
        $submitRecipe = $submitRecipeController->addRecipe($recipeName, $resultArray, $instructions, $cookingTime, $servingSize, $user_id, $category);
    }

    
    header('Location: ../scripts/GetRecipesScript.php');
}

function validations($recipeName, $resultArray, $instructions, $cookingTime, $servingSize, $category){
    if (empty(trim($recipeName))) {
        return "Nome da receita é obrigatório";
    }
    if (empty(trim($instructions))) {
        return "Instruções são obrigatórias";
    }
    if (empty(trim($cookingTime))) {
        return "Tempo de cozimento é obrigatório";
    }
    if (empty(trim($servingSize))) {
        return "Porções são obrigatórias";
    }
    if (empty(trim($category))) {
        return "Categoria é obrigatória";
    }
    if(!is_numeric($cookingTime)){
        return "Tempo de cozimento deve ser um número";
    }
    if(!is_numeric($servingSize)){
        return "Porções deve ser um número";
    }
    return "";
}
?>
