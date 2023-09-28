<?php
class Recipe {
    private $name;
    private $ingredients;
    private $instructions;
    private $cookingTime;
    private $servingSize;

    public function __construct($name, $ingredients, $instructions, $cookingTime, $servingSize) {
        $this->name = $name;
        $this->ingredients = $ingredients;
        $this->instructions = $instructions;
        $this->cookingTime = $cookingTime;
        $this->servingSize = $servingSize;
    }

    public function addIngredient($ingredient) {
        $this->ingredients[] = $ingredient;
    }

    public function updateInstructions($newInstructions) {
        $this->instructions = $newInstructions;
    }
}
?>