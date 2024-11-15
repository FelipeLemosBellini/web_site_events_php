<?php

require_once 'controllers/EventoController.php';
require_once 'controllers/UsuarioController.php';

$controller = null;

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

if (isset($_GET['acao'])) {
    switch ($_GET['acao']) {
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
        case 'participar':
            $controller->participar();
            break;
        case 'cancelar_participacao':
            $controller->cancelarParticipacao();
            break;
        
        default:
            $controller->index();
            break;
    }
} else {
    $controller->index();
}
