<?php

session_start();

class LoginController {
    private $userModel;

    public function __construct($userModel) {
        $this->userModel = $userModel;
    }

    public function login($username, $password) {
        $user = $this->userModel->getUserByUsernameAndPassword($username, $password);

        try {
            if ($user) {
                $_SESSION['username'] = $user['username'];
                return true;
            } else {
                $_SESSION['error_message'] = "Credenciais inválidas. Tente novamente.";
                return false;
            }
        } catch (Exception $e) {
            $_SESSION['error_message'] = "Erro: " . $e->getMessage();
            return false;
        }
    }
}

?>