<?php

session_start();
class SubmitRecipeController {
    private $recipeModel;

    public function __construct($recipeModel) {
        $this->recipeModel = $recipeModel;
    }
    
    public function addRecipe($name, $ingredients, $instructions, $cookingTime, $servingSize, $user_id, $category_id, $file) {
        try {
            $id = $this->recipeModel->createRecipe($name, $ingredients, $instructions, $cookingTime, $servingSize, $user_id, $category_id);

            $folder = '../Images/'; // Defina o caminho para a pasta onde você deseja salvar as imagens
            $file_name = $user_id . "_" . $id . '.png';
            $filePath = $folder . $file_name; // Crie o caminho completo do arquivo

            // Verifique se o arquivo é uma imagem
            if (getimagesize($file['tmp_name']) !== false) {
                // Tente mover o arquivo enviado para a pasta de destino
                if (move_uploaded_file($file['tmp_name'], $filePath)) {
                    echo 'Arquivo salvo com sucesso em: ' . $filePath;
                    $this->recipeModel->saveImageById($id, $file_name);
                } else {
                    echo 'Desculpe, houve um erro ao salvar seu arquivo.';
                }
            } else {
                echo 'O arquivo enviado não é uma imagem.';
            }


            return true;
        } catch (Exception $e) {
            $_SESSION['error_message'] = "Erro: " . $e->getMessage();
            return false;
        }
    }
    
}

?>