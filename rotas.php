<?php

require_once 'controllers/EventoController.php';
require_once 'controllers/UsuarioController.php';

$controller = null;

// Define o controlador com base no parâmetro 'controller'
if (isset($_GET['controller'])) {
    switch ($_GET['controller']) {
        case 'usuario':
            $controller = new UsuarioController();
            break;
        case 'evento':
        default:
            $controller = new EventoController();
            break;
    }
} else {
    $controller = new EventoController();
}

// Define a ação com base no parâmetro 'acao'
if (isset($_GET['acao'])) {
    switch ($_GET['acao']) {
        // Rotas para o EventoController
        case 'create':
            $controller->create();
            break;
        case 'detalhes':
            $controller->detalhes();
            break;
        case 'delete':
            $controller->delete();
            break;
        case 'store':
            $controller->store();
            break;
        case 'update':
            $controller->update();
            break;
        case 'edit':
            $controller->edit();
            break;

        case 'login':
            $controller->login();
            break;
        case 'logout':
            $controller->logout();
            break;
        
        default:
            $controller->index();
            break;
    }
} else {
    $controller->index();
}
