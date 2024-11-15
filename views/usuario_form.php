<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Evento</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            background-color: #f8f8f8;
        }

        h1 {
            font-size: 24px;
            font-weight: bold;
            margin: 20px 0;
            color: #6a0dad;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 14px;
            margin-top: 10px;
            color: #555;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"],
        input[type="date"] {
            padding: 10px;
            margin-top: 5px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            background-color: #f9f9f9;
        }

        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="date"]:focus {
            border-color: #6a0dad;
            outline: none;
            background-color: #fff;
        }

        .switch-container {
            display: flex;
            align-items: center;
            margin-top: 15px;
        }

        .switch-label {
            margin-right: 10px;
            font-weight: bold;
            color: #555;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 25px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            border-radius: 25px;
            transition: 0.4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 19px;
            width: 19px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            border-radius: 50%;
            transition: 0.4s;
        }

        input:checked + .slider {
            background-color: #6a0dad;
        }

        input:checked + .slider:before {
            transform: translateX(25px);
        }

        button {
            padding: 12px;
            margin-top: 20px;
            font-size: 16px;
            background-color: #6a0dad;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background-color: #5a009d;
        }
    </style>
</head>
<body>
<h1><?= isset($usuario) ? 'Editar Usuário' : 'Criar Novo Evento' ?></h1>
<form action="<?= isset($usuario) ? '?controller=usuario&acao=edit&id=' . $usuario['id'] : '?acao=store' ?>" method="post">
    <label for="nome">Nome</label>
    <input type="text" name="nome" id="nome" value="<?= isset($usuario) ? htmlspecialchars($usuario['nome']) : '' ?>">

    <label for="descricao">Email</label>
    <input type="text" name="email" id="email" value="<?= isset($usuario) ? htmlspecialchars($usuario['email']) : '' ?>">

    <label for="senha">Senha</label>
    <input type="password" name="senha" id="senha" value="<?= isset($usuario) ? htmlspecialchars($usuario['senha']) : '' ?>">

    <div class="switch-container">
        <span class="switch-label">Organizador</span>
        <label class="switch">
            <input type="checkbox" name="tipo" id="tipo" <?= isset($usuario) && $usuario['tipo'] == 'organizador' ? 'checked' : '' ?>>
            <span class="slider"></span>
        </label>
    </div>

    <button type="submit">Salvar</button>
</form>
</body>
</html>
