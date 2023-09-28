<?php
class User {
    private $username;
    private $email;
    private $password;
    private $savedRecipes;
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getIdByUser($username){
        $query = "SELECT id FROM users WHERE username = :username";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':username', $username, SQLITE3_TEXT);  // Use the provided username
    
        $result = $stmt->execute();
        $row = $result->fetchArray(SQLITE3_ASSOC);
    
        // Check if a row was fetched and return the id (casted to integer)
        if ($row && isset($row['id'])) {
            return (int)$row['id'];
        }
    
        // Return null or any appropriate value if no id was found
        return null;
    }
    
    public function getUsernameById($id){
        $query = "SELECT username FROM users WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);  // Use the provided username
    
        $result = $stmt->execute();
        $row = $result->fetchArray(SQLITE3_ASSOC);
    
        // Check if a row was fetched and return the id (casted to integer)
        if ($row && isset($row['username'])) {
            return $row['username'];
        }
    
        // Return null or any appropriate value if no id was found
        return null;
    }

    public function getUserByUsername($username){
        $query = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':username', $username, SQLITE3_TEXT);

        $result = $stmt->execute();

        return $result->fetchArray(SQLITE3_ASSOC);
    }
    public function getUserByUsernameAndPassword($username, $password) {
        $query = "SELECT * FROM users WHERE username = :username AND password = :password";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':username', $username, SQLITE3_TEXT);
        $stmt->bindValue(':password', $password, SQLITE3_TEXT);

        $result = $stmt->execute();

        return $result->fetchArray(SQLITE3_ASSOC);
    }

    public function createUser($username, $password) {
        $count = 'SELECT COUNT(*) FROM users';
        $stmt = $this->db->prepare($count);
        $result = $stmt->execute();
        $id = $result->fetchArray()[0] + 1;

        $query = 'INSERT INTO users (id, username, password) VALUES (:id, :username, :password)';
        $stmt = $this->db->prepare($query);
    
        // Bind parameters to placeholders using bindValue
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
        $stmt->bindValue(':username', $username, SQLITE3_TEXT);
        $stmt->bindValue(':password', $password, SQLITE3_TEXT);
    
        // Execute the statement
        return $stmt->execute();
    }

    public function updateProfile($newUsername, $newEmail, $newPassword) {
        $this->username = $newUsername;
        $this->email = $newEmail;
        $this->password = $newPassword;
    }

    public function removeSavedRecipe($recipe) {
        $index = array_search($recipe, $this->savedRecipes);
        if ($index !== false) {
            unset($this->savedRecipes[$index]);
        }
    }

    public function authenticate($enteredPassword) {
        return $enteredPassword === $this->password;
    }
}
?>