<?php
require_once '../db.php';
require_once '../controllers/UsuarioController.php';

$erro = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuarioController = new UsuarioController();
    $erro = $usuarioController->create();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
            margin: 0;
        }

        .login-container {
            width: 300px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .input-group {
            margin-bottom: 15px;
        }

        input[type="email"],
        input[type="text"],
        input[type="password"] {
            width: 80%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #6a0dad;
            color: white;
            font-weight: bold;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
        }

        button:hover {
            background-color: #5a009d;
        }

        .error {
            color: red;
            font-weight: bold;
            margin-top: 10px;
            text-align: center;
        }

        .error span {
            display: block;
            padding: 5px;
            background-color: #fdd;
            border: 1px solid red;
            border-radius: 3px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="login-container">
    <h2>Login</h2>

    <form method="POST" action="?acao=store">
        <div>
            <div class="input-group">
                <input type="text" name="nome" placeholder="Nome" required>
            </div>
            <div class="input-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <input type="password" name="senha" placeholder="Senha" required>
            </div>
            <div class="input-group">
                <input type="password" name="confirmacao_senha" placeholder="Confirme sua senha" required>
            </div>

            <button type="submit">Registrar</button>
        </div>
    </form>

    <?php if (!empty($erro)): ?>
        <div class="error">
            <span><?php echo htmlspecialchars($erro); ?></span>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
