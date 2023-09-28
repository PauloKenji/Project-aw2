<?php
class ShowRecipeController {

    private $RecipeModel;
    private $IngredientModel;

    public function __construct($RecipeModel, $IngredientModel) {
        $this->RecipeModel = $RecipeModel;
        $this->IngredientModel = $IngredientModel;
    }

    public function getRecipeById($id){
        $recipe = $this->RecipeModel->getRecipeById($id);
        
    
        return $recipe;
    }

    public function getIngredientsByRecipeId($id){
        $ingredients = $this->IngredientModel->getIngredientsByRecipeId($id);

        for($i = 0; $i < count($ingredients); $i++){
            $ingredients[$i]['name'] = $this->IngredientModel->getNameById($ingredients[$i]['ingredient_id']);
        }

        return $ingredients;
    }
    
}
?>
