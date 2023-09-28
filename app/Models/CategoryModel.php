<?php
class Category {
    
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllCategory(){
        $query = "SELECT * FROM categories";
        $result = $this->db->query($query);
        $data = array();  // Initialize an array to store the rows

        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            // Add each row to the data array
            $data[] = $row;
        }

        return $data;
    }

    public function getNameById($id){
        $query = "SELECT name FROM categories WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);  // Use the provided username
    
        $result = $stmt->execute();
        $row = $result->fetchArray(SQLITE3_ASSOC);
    
        // Check if a row was fetched and return the id (casted to integer)
        if ($row && isset($row['name'])) {
            return $row['name'];
        }
    
        // Return null or any appropriate value if no id was found
        return null;
    }

}
?>