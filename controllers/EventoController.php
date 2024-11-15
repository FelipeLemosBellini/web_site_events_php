<?php

class EventoController
{
    public function __construct()
    {
        session_start();
        require_once 'models/Evento.php';
        require_once 'models/Inscricoes.php';
        require_once 'models/Usuario.php';
    }

    public function index()
    {
        $evento = new Evento();
        $eventos = $evento->getEventos($_SESSION['user_id']);
        $isParticipante = $_SESSION['user_tipo'] == 'participante';
        $usuario = new Usuario();
        $usuarios = $usuario->getUsuarios();

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

    public function participar()
    {
        $idEvento = $_GET['id_evento'];
        $eventoInstance = new Evento();
        $evento = $eventoInstance->getEvento($idEvento);

        $inscricaoInstance = new Inscricoes();
        $totalInscricoes = $inscricaoInstance->getTotalInscricoes($idEvento);

        if($evento['limite_inscricoes'] <= $totalInscricoes) {
            echo 'Limite de inscrições atingido';
            return false;
        }

        $data = [
          'idEvento' => $idEvento,
            'idParticipante' => $_SESSION['user_id']
        ];

        $inscricaoInstance->create($data);

        header('Location: /web_site_events_php');
    }

    public function cancelarParticipacao()
    {
        $id = $_GET['id'];
        $inscricao = new Inscricoes();

        $inscricao->delete($id);

        header('Location: /web_site_events_php');
    }
}