<?php

session_start();

require_once '../app/Controllers/LoginController.php';
require_once '../config/modelsConfig.php';
setcookie('auth_token', '', time() - 3600, '/');

session_destroy();


header("Location: ../views/HomeView.php");
?>
