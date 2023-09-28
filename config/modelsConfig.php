<?php

require_once 'database.php';
require_once '../app/Models/UserModel.php';
require_once '../app/Models/RecipeModel.php';
require_once '../app/Models/IngredientModel.php';
require_once '../app/Models/CategoryModel.php';

$db = Database::getInstance();
$db = $db->getDB();

$sql = '
CREATE TABLE IF NOT EXISTS users (
    id INTEGER AUTO INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

DROP TABLE IF EXISTS categories;

CREATE TABLE IF NOT EXISTS categories (
    id INTEGER AUTO INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

INSERT INTO categories (id, name) VALUES (1, "sobremesa");
INSERT INTO categories (id, name) VALUES (2, "refeição");
INSERT INTO categories (id, name) VALUES (3, "entrada");
INSERT INTO categories (id, name) VALUES (4, "bebida");

CREATE TABLE IF NOT EXISTS recipes (
    id INTEGER AUTO INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    instructions TEXT NOT NULL,
    cookingTime INT,
    servingSize INT,
    user_id INTEGER,
    category_id INTEGER,
    FOREIGN KEY (user_id) REFERENCES User(id),
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

CREATE TABLE IF NOT EXISTS ingredients (
    id INTEGER AUTO INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    recipe_id INTEGER,
    FOREIGN KEY (recipe_id) REFERENCES Recipe(id)
);

CREATE TABLE IF NOT EXISTS recipe_ingredients (
    recipe_id INTEGER,
    ingredient_id INTEGER,
    quantity INT,
    FOREIGN KEY (recipe_id) REFERENCES Recipe(id),
    FOREIGN KEY (ingredient_id) REFERENCES Ingredient(id)
);

';
$db->exec($sql);

$Ingredient = new Ingredient($db);
$User = new User($db);
$Recipe = new Recipe($db);
$Category = new Category($db);

?>