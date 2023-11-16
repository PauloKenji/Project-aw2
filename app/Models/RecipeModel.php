<?php
class Recipe {
    private $name;
    private $ingredients;
    private $instructions;
    private $cookingTime;
    private $servingSize;
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getRecipeById($id){
        $query = "SELECT * FROM recipes WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
        $result = $stmt->execute();
        $row = $result->fetchArray(SQLITE3_ASSOC);
        return $row;
    }

    public function createRecipe($name, $ingredients, $instructions, $cookingTime, $servingSize, $user_id, $category_id) {
        $count = 'SELECT COUNT(*) FROM recipes';
        $stmt = $this->db->prepare($count);
        $result = $stmt->execute();
        $id = $result->fetchArray()[0] + 1;
        
        $sql = 'INSERT INTO recipes (id, name, instructions, cookingTime, servingSize, user_id, category_id) VALUES (:id, :name, :instructions, :cookingTime, :servingSize, :user_id, :category_id)';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
        $stmt->bindValue(':name', $name, SQLITE3_TEXT);
        $stmt->bindValue(':instructions', $instructions, SQLITE3_TEXT);
        $stmt->bindValue(':cookingTime', $cookingTime, SQLITE3_INTEGER);
        $stmt->bindValue(':servingSize', $servingSize, SQLITE3_INTEGER);
        $stmt->bindValue(':user_id', $user_id, SQLITE3_INTEGER);
        $stmt->bindValue(':category_id', $category_id, SQLITE3_INTEGER);
        #add ingredients
        for ($i = 0; $i < count($ingredients); $i++) {
            $quantity = $ingredients[$i][0];
            $ingredient = $ingredients[$i][1];
            $this->addIngredient($ingredient, $id, $quantity);
        }
        $stmt->execute();
        return $id;
    }

    public function saveImageById($id, $file_name){
        try{
        $sql = 'UPDATE recipes SET image_name = :image_name WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
        $stmt->bindValue(':image_name', $file_name, SQLITE3_TEXT);
        $stmt->execute();
        }catch(Exception $e){
            echo $e->getMessage();
            exit;
        }
    }

    public function getAllRecipe(){
        $query = "SELECT * FROM recipes";
        $stmt = $this->db->prepare($query);
        $result = $stmt->execute();
    
        $data = array();  // Initialize an array to store the rows

        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            // Add each row to the data array
            $data[] = $row;
        }

        return $data;  // Return the data array
    }
    

    public function getAllRecipeByUser($user_id){

        // $query = "SELECT id FROM users WHERE username = :username";
        // $stmt = $this->db->prepare($query);
        // $stmt->bindValue(':username', $username, SQLITE3_TEXT);  // Use the provided username
    
        // $result = $stmt->execute();
        // $row = $result->fetchArray(SQLITE3_ASSOC);
        // $user_id = null;
        // // Check if a row was fetched and return the id (casted to integer)
        // if ($row && isset($row['id'])) {
        //     $user_id = (int)$row['id'];
        // }

        $query = "SELECT * FROM recipes WHERE user_id = :user_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':user_id', $user_id , SQLITE3_INTEGER);
        $result = $stmt->execute();

        $data = array();  // Initialize an array to store the rows

        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            // Add each row to the data array
            $data[] = $row;
        }

        return $data;
    }

    public function getAllRecipeByCategory($category_id){
        $query = "SELECT * FROM recipes WHERE category_id = :category_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':category_id', $category_id , SQLITE3_INTEGER);
        $result = $stmt->execute();

        $data = array();  // Initialize an array to store the rows

        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            // Add each row to the data array
            $data[] = $row;
        }

        return $data;
    }

    public function addIngredient($ingredient, $recipe_id, $quantity) {
        $count = 'SELECT COUNT(*) FROM ingredients';
        $stmt = $this->db->prepare($count);
        $result = $stmt->execute();
        $id = $result->fetchArray()[0] + 1;
        $query = "INSERT INTO ingredients (id, name) VALUES (:id, :name)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
        $stmt->bindValue(':name', $ingredient, SQLITE3_TEXT);
        $stmt->execute();

        $query = "INSERT INTO recipe_ingredients (recipe_id, ingredient_id, quantity) VALUES (:recipe_id, :ingredient_id, :quantity)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':recipe_id', $recipe_id, SQLITE3_INTEGER);
        $stmt->bindValue(':ingredient_id', $id, SQLITE3_INTEGER);
        $stmt->bindValue(':quantity', $quantity, SQLITE3_INTEGER);
        $stmt->execute();

    }

    public function updateInstructions($newInstructions) {
        $this->instructions = $newInstructions;
    }
}
?>