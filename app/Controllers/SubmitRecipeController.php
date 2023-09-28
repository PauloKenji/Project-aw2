<?php

session_start();
class SubmitRecipeController {
    private $recipeModel;

    public function __construct($recipeModel) {
        $this->recipeModel = $recipeModel;
    }
    
    public function addRecipe($name, $ingredients, $instructions, $cookingTime, $servingSize, $user_id, $category_id) {
        try {
            $this->recipeModel->createRecipe($name, $ingredients, $instructions, $cookingTime, $servingSize, $user_id, $category_id);
            return true;
        } catch (Exception $e) {
            $_SESSION['error_message'] = "Erro: " . $e->getMessage();
            return false;
        }
    }
    
}

?>