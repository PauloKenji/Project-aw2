<?php

class Category {
    private $name;
    private $recipes;

    public function __construct($name) {
        $this->name = $name;
        $this->recipes = [];
    }

    public function addRecipe($recipe) {
        $this->recipes[] = $recipe;
    }

    public function removeRecipe($recipe) {
        // You can implement logic here to remove the recipe from the category
    }
}
?>