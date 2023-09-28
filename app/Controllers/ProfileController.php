<?php
class ProfileController {

    private $UserModel;
    private $RecipeModel;

    private $Ingredients;

    public function __construct($UserModel, $RecipeModel, $Ingredients) {
        $this->UserModel = $UserModel;
        $this->RecipeModel = $RecipeModel;
        $this->Ingredients = $Ingredients;
    }

    public function getAllRecipes(){
        $recipes = $this->RecipeModel->getAllRecipe();
        return $recipes;
    }
    
    public function listUserRecipes($username) {
        // Assume you have a model named RecipeModel with a method to get user's recipes

        
        $user_id = $this->UserModel->getIdByUser($username);

        $recipes = $this->RecipeModel->getAllRecipeByUser($user_id);
        
        return $recipes;
    }

        // Função para renderizar a view (exemplo, adapte conforme necessário)
    private function render($view, $data = array()) {
        extract($data);
        include($view);
    }
}
?>
