<?php
// Inicializa a sessão (se necessário)
session_start();

setcookie('auth_token', '', time() - 3600, '/');

session_destroy();

// Verifica se o usuário está autenticado
// if (!isset($_SESSION['username'])) {
//     // Usuário não autenticado, redirecione para a página de login
//     header('Location: /views/LoginView.php');
//     exit();
// }

header('Location: ../scripts/HomeScript.php');

// Inclui o arquivo de rotas
require_once 'app/routes.php';
?>