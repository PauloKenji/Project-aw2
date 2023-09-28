<?php
class ShowCategory {

    private $UserModel;
    private $RecipeModel;

    private $CategoryModel;

    public function __construct($UserModel, $RecipeModel, $CategoryModel) {
        $this->UserModel = $UserModel;
        $this->RecipeModel = $RecipeModel;
        $this->CategoryModel = $CategoryModel;
    }

    public function getAllRecipesByCategory($category_id){
        $recipes = $this->RecipeModel->getAllRecipeByCategory($category_id);
        return $recipes;
    }
}
?>
