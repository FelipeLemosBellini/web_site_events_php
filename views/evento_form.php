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
        input[type="date"]:focus {
            border-color: #6a0dad;
            outline: none;
            background-color: #fff;
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
<h1><?= isset($evento) ? 'Editar Evento' : 'Criar Novo Evento' ?></h1>
<form action="<?= isset($evento) ? '?acao=edit&id=' . $evento['id'] : '?acao=store' ?>" method="post">
    <label for="titulo">Título</label>
    <input type="text" name="titulo" id="titulo" value="<?= isset($evento) ? htmlspecialchars($evento['titulo']) : '' ?>">

    <label for="descricao">Descrição</label>
    <input type="text" name="descricao" id="descricao" value="<?= isset($evento) ? htmlspecialchars($evento['descricao']) : '' ?>">

    <label for="data">Data</label>
    <input type="date" name="data" id="data" value="<?= isset($evento) ? htmlspecialchars($evento['data']) : '' ?>">

    <label for="local">Local</label>
    <input type="text" name="local" id="local" value="<?= isset($evento) ? htmlspecialchars($evento['local']) : '' ?>">

    <label for="limite_inscricao">Limite de inscrição</label>
    <input type="text" name="limite_inscricao" id="limite_inscricao" value="<?= isset($evento) ? htmlspecialchars($evento['limite_inscricoes']) : '' ?>">

    <label for="organizador_id">Organizador</label>
    <input type="text" name="organizador_id" id="organizador_id" value="<?= isset($evento) ? htmlspecialchars($evento['organizador_id']) : '' ?>">

    <button type="submit">Salvar</button>
</form>
</body>
</html>
