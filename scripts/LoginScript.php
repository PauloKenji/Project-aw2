<?php

require_once '../app/Controllers/LoginController.php';
require_once '../config/modelsConfig.php';

$loginController = new LoginController($User);

// Obtém os dados do formulário
$username = $_POST['username'];
$password = $_POST['password'];

if(empty(trim($username))){
    $_SESSION['error_message'] = "Nome de usuário é obrigatório";
    header("Location: ../views/LoginView.php");
    exit();
}
if(empty(trim($password))){
    $_SESSION['error_message'] = "Senha é obrigatória";
    header("Location: ../views/LoginView.php");
    exit();
}

// Faça o login
$loginSuccessful = $loginController->login($username, $password);

if ($loginSuccessful) {
    // Define um cookie com o ID do usuário ou um token de autenticação
    $expiryTime = time() + 3600;  // Expire em 1 hora
    setcookie('auth_token', $username, $expiryTime, '/');
    
    // Redirecione para a página após o login bem-sucedido
    header("Location: ../views/HomeView.php");
    exit();
} else {
    // Redirecione para a página de login com uma mensagem de erro
    header("Location: ../views/LoginView.php"); 
    exit();
}
?>
