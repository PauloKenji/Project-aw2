<?php
require_once '../app/Controllers/RegisterController.php';
require_once '../config/modelsConfig.php';

$RegisterController = new RegisterController($User);

if(!isset($_SESSION)) {
    session_start();
}

$username = $_POST['username'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];
if(empty(trim($username))){
    $_SESSION['error_message'] = "Nome de usuário é obrigatório";
    header("Location: ../views/RegisterView.php");
    exit();
}
if(empty(trim($password))){
    $_SESSION['error_message'] = "Senha é obrigatória";
    header("Location: ../views/RegisterView.php");
    exit();
}
if(empty(trim($confirmPassword))){
    $_SESSION['error_message'] = "Confirmação de senha é obrigatória";
    header("Location: ../views/RegisterView.php");
    exit();
}


$RegisterController->register($username, $password, $confirmPassword);


// }
?>
