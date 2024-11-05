<?php

require_once 'controllers/EventoController.php';

$controller = new EventoController();


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
        default:
            $controller->index();
            break;
    }
} else {
    $controller->index();
}
?>
