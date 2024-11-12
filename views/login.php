<?php
require_once '../db.php';
require_once '../controllers/UsuarioController.php';

$erro = ''; // Inicializa a variável de erro

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuarioController = new UsuarioController();
    $erro = $usuarioController->login();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        input[type="password"] {
            width: 80%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button, a {
            display: inline-block;
            width: 100%;
            padding: 10px;
            background-color: #6a0dad;
            color: white;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            border-radius: 5px;
            margin-bottom: 10px;
            border: none;
            box-sizing: border-box;
        }

        a {
            font-size: small;
            background-color: #777777;
            line-height: normal;
        }

        button:hover {
            background-color: #5a009d;
        }

        .error {
            color: red;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>

        <form method="POST" action="login.php">
            <div class="input-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <input type="password" name="senha" placeholder="Senha" required>
            </div>
            <button type="submit">Entrar</button>
            <a type="button" href="registro.php">Registrar</a>
            <?php if (!empty($erro)): ?>
                <div class="error">
                    <?php echo htmlspecialchars($erro); ?>
                </div>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
