<?php
session_start();
class RegisterController {
    private $userModel;

    public function __construct($userModel) {
        $this->userModel = $userModel;
    }

    public function register($username, $password, $confirmPassword) {
        try {
            
            if ($password != $confirmPassword) {
                $_SESSION['error_message'] = "As senhas não coincidem";
            } elseif ($this->userModel->getUserByUsername($username)) {
                $_SESSION['error_message'] = "Usuário já existe";
            } else {
                $user = $this->userModel->createUser($username, $password);
                $_SESSION['error_message'] = "Registro feito com sucesso<br>faça login para continuar";
                header("Location: ../views/LoginView.php");
                exit();
            }   
            header("Location: ../views/RegisterView.php");  // Redirecione de volta à página de registro
            exit();
        } catch (Exception $e) {
            $_SESSION['error_message'] = "Erro: " . $e->getMessage();
            header("Location: ../views/RegisterView.php");  // Redirecione de volta à página de registro
            exit();
        }
    }
    
}

?>