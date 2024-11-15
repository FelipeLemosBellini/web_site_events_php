<?php

class UsuarioController
{
    public function __construct()
    {
        session_start();

        if (file_exists('models/Usuario.php')) {
            require_once 'models/Usuario.php';
        } elseif (file_exists('../models/Usuario.php')) {
            require_once '../models/Usuario.php';
        }
    }

    public function index()
    {
        $usuario = new Usuario();
        $usuarios = $usuario->getUsuarios();

        require_once 'views/usuarios_list.php';
    }

    public function create()
    {
        $erros = [];

        if (empty($_POST['nome'])) {
            $erros[] = 'Nome é obrigatório';
        }

        if (empty($_POST['email'])) {
            $erros[] = 'Email é obrigatório';
        }

        if (empty($_POST['senha'])) {
            $erros[] = 'Senha é obrigatória';
        }

        if(isset($_POST['confirmacao_senha']) && $_POST['senha'] != $_POST['confirmacao_senha']){
            $erros[] = 'As senhas não conferem';
        }

        if (!empty($erros)) {
            foreach ($erros as $erro) {
                echo $erro . '<br>';
            }
            return false;
        }

        $data = [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => $_POST['senha'],
            'tipo' => $_POST['tipo'] ?: 'participante',
        ];

        $usuario = new Usuario();
        $usuario->create($data);


        $_SESSION['user_id'] = $usuario->getId();
        $_SESSION['user_nome'] = $usuario->getNome();
        $_SESSION['user_tipo'] = $usuario->getTipo();

        header('Location: /web_site_events_php');
        exit;
    }

    public function store()
    {
        $erros = [];

        if (empty($_POST['nome'])) {
            $erros[] = 'Nome é obrigatório';
        }

        if (empty($_POST['email'])) {
            $erros[] = 'Email é obrigatório';
        }

        if (empty($_POST['senha'])) {
            $erros[] = 'Senha é obrigatória';
        }

        if (empty($_POST['tipo'])) {
            $erros[] = 'Tipo de usuário é obrigatório';
        }

        if(isset($_POST['confirmacao_senha']) && $_POST['senha'] != $_POST['confirmacao_senha']){
            $erros[] = 'As senhas não conferem';
        }

        if (!empty($erros)) {
            foreach ($erros as $erro) {
                echo $erro . '<br>';
            }
            return false;
        }

        $data = [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => $_POST['senha'],
            'tipo' => $_POST['tipo'] ?: 'participante',
        ];

        $usuario = new Usuario();
        $usuario->create($data);

        $_SESSION['user_id'] = $usuario->getId();
        $_SESSION['user_nome'] = $usuario->getNome();
        $_SESSION['user_tipo'] = $usuario->getTipo();

        header('Location: /web_site_events_php');
        exit;
    }

    public function delete()
    {
        $id = $_GET['id'];
        $usuario = new Usuario();

        $usuario->delete($id);

        header('Location: /web_site_events_php');
    }

    public function update()
    {
        $id = $_GET['id'];
        $usuario = new Usuario();
        $usuario = $usuario->getUsuario($id);

        require_once 'views/usuario_form.php';
    }

    public function edit()
    {
        $erros = [];

        if (empty($_POST['nome'])) {
            $erros[] = 'Nome é obrigatório';
        }

        if (empty($_POST['email'])) {
            $erros[] = 'Email é obrigatório';
        }

        if (empty($_POST['senha'])) {
            $erros[] = 'Senha é obrigatória';
        }

        if (!empty($erros)) {
            foreach ($erros as $erro) {
                echo $erro . '<br>';
            }
            return false;
        }

        $data = [
            'id' => $_GET['id'],
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => $_POST['senha'],
            'tipo' => $_POST['tipo'] ? 'organizador' : 'participante',
        ];

        $usuario = new Usuario();
        $usuario->update($data);

        header('Location: /web_site_events_php');
        exit;
    }

    public function login()
    {
        $erros = [];

        if (empty($_POST['email'])) {
            $erros[] = 'Email é obrigatório';
        }

        if (empty($_POST['senha'])) {
            $erros[] = 'Senha é obrigatória';
        }

        if (!empty($erros)) {
            foreach ($erros as $erro) {
                echo $erro . '<br>';
            }
            return false;
        }

        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $usuario = new Usuario();
        if ($usuario->authenticate($email, $senha)) {
            $_SESSION['user_id'] = $usuario->getId();
            $_SESSION['user_nome'] = $usuario->getNome();
            $_SESSION['user_tipo'] = $usuario->getTipo();

            header('Location: /web_site_events_php');
            exit;
        } else {
            $erros[] = 'Credenciais Invalidas';
            foreach ($erros as $erro) {
                echo $erro . '<br>';
            }
        }
    }


    public function logout()
    {
        setcookie('id_user', '', time() - 3600, "/");
        setcookie('nome_user', '', time() - 3600, "/");
        setcookie('tipo_user', '', time() - 3600, "/");
        session_unset();
        session_destroy();
        header('Location: /web_site_events_php/login.php');
    }
}
?>
