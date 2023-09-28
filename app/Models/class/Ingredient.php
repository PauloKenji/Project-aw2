<?php
class Ingredient {
    private $name;
    
    public function __construct($name, $quantity, $unit) {
        $this->name = $name;
    }
}
?>