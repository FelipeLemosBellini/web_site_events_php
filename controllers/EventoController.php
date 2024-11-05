<?php

class EventoController
{
    public function __construct()
    {
        require_once 'models/Evento.php';
    }

    public function index()
    {
        $evento = new Evento();
        $eventos = $evento->getEventos();

        require_once 'views/home.php';
    }

    public function create()
    {
        require_once 'views/evento_form.php';
    }

    public function store()
    {
        $erros = [];

        if (empty($_POST['titulo'])) {
            $erros[] = 'Titulo é obrigatório';
        }

        if (empty($_POST['descricao'])) {
            $erros[] = 'Descrição é obrigatória';
        }

        if (empty($_POST['data'])) {
            $erros[] = 'Data é obrigatória';
        }

        if (empty($_POST['local'])) {
            $erros[] = 'Local é obrigatório';
        }

        if (empty($_POST['limite_inscricao'])) {
            $erros[] = 'Limite de inscrição é obrigatório';
        }

        if (!empty($erros)) {
            foreach ($erros as $erro) {
                echo $erro . '<br>';
            }
            return false;
        }

        $data = [
            'titulo' => $_POST['titulo'],
            'descricao' => $_POST['descricao'],
            'data' => $_POST['data'],
            'local' => $_POST['local'],
            'limite_inscricao' => $_POST['limite_inscricao'],
        ];

        $evento = new Evento();
        $evento->create($data);

        header('Location: /web_site_events_php');
        exit;
    }

    public function delete()
    {
        $id = $_GET['id'];
        $evento = new Evento();

        $evento->delete($id);

        header('Location: /web_site_events_php');
    }

    public function update()
    {
        $id = $_GET['id'];
        $evento = new Evento();
        $evento = $evento->getEvento($id);

        require_once 'views/evento_form.php';
    }

    public function edit()
    {
        $erros = [];

        if (empty($_POST['titulo'])) {
            $erros[] = 'Titulo é obrigatório';
        }

        if (empty($_POST['descricao'])) {
            $erros[] = 'Descrição é obrigatória';
        }

        if (empty($_POST['data'])) {
            $erros[] = 'Data é obrigatória';
        }

        if (empty($_POST['local'])) {
            $erros[] = 'Local é obrigatório';
        }

        if (empty($_POST['limite_inscricao'])) {
            $erros[] = 'Limite de inscrição é obrigatório';
        }

        if (!empty($erros)) {
            foreach ($erros as $erro) {
                echo $erro . '<br>';
            }
            return false;
        }

        $data = [
            'id' => $_GET['id'],
            'titulo' => $_POST['titulo'],
            'descricao' => $_POST['descricao'],
            'data' => $_POST['data'],
            'local' => $_POST['local'],
            'limite_inscricao' => $_POST['limite_inscricao'],
        ];

        $evento = new Evento();
        $evento->update($data);

        header('Location: /web_site_events_php');
        exit;
    }
}