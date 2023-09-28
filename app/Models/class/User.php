<?php
class User {
    private $username;
    private $email;
    private $password;
    private $savedRecipes;

    public function __construct($username, $email, $password) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->savedRecipes = [];
    }
    
    public function getUsername() {
        return $this->username;
    }

    public function getEmail() {
        return $this->email;
    }

    public function updateProfile($newUsername, $newEmail, $newPassword) {
        $this->username = $newUsername;
        $this->email = $newEmail;
        $this->password = $newPassword;
    }

    public function saveRecipe($recipe) {
        $this->savedRecipes[] = $recipe;
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