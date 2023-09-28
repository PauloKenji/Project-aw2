<?php
class Ingredient {
    
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getIngredientsByRecipeId($id){
        $query = "SELECT * FROM recipe_ingredients WHERE recipe_id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
        $result = $stmt->execute();
        $data = array();  // Initialize an array to store the rows

        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            // Add each row to the data array
            $data[] = $row;
        }

        return $data;
    }

    public function getNameById($id){
        $query = "SELECT name FROM ingredients WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
        $result = $stmt->execute();
        $row = $result->fetchArray(SQLITE3_ASSOC);
        return $row['name'];
    }
}
?>