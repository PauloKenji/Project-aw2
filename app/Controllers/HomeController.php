<?php
class HomeController {
    public function index() {
        // Suponha que você tenha uma função render que renderiza a view
        $this->render('views/HomeView.php', array(
            'title' => 'Página Inicial',
            'content' => 'Bem-vindo à nossa página inicial!'
        ));
    }

    // Função para renderizar a view (exemplo, adapte conforme necessário)
    private function render($view, $data = array()) {
        extract($data);
        include($view);
    }
}
?>
