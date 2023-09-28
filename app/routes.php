<?php
// Inclua os arquivos necessários
require_once 'app/Controllers/HomeController.php';
require_once 'app/Controllers/ProfileController.php';
// Função para rotear as requisições
function route($url) {

    require_once 'config/modelsConfig.php';
    $urlParts = explode('/', $url);

    // Roteamento baseado na URL
    switch ($urlParts[0]) {
        case '':
            $homeController = new HomeController();
            $homeController->index();
            break;
        case 'profile/':
            $profileController = new ProfileController($User, $Recipe);
            $profileController->listUserRecipes($urlParts[1]);
            break;
        default:
            // Trate aqui o caso de uma rota não reconhecida
            echo 'Rota não reconhecida.';
            break;
    }
}

// Obtém a URL da requisição atual
$url = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/';

// Chama a função de roteamento
route($url);
?>
