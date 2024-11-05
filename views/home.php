<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Eventos</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            color: #333;
            text-align: center;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            border-bottom: 1px solid #eaeaea;
        }

        h1 {
            font-size: 24px;
            font-weight: bold;
        }

        .header-content .br {
            font-size: 14px;
            vertical-align: super;
            color: #777;
        }

        .search-bar {
            width: 500px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .logout{
            padding: 10px 20px;
            background-color: #ccc;
            color: #333;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        .add-event {
            padding: 10px 20px;
            background-color: #6a0dad;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        .add-event:hover {
            background-color: #5a009d;
        }

        main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .event-list {
            text-align: center;
            max-width: 800px;
            padding: 40px 20px;
        }

        .event-list h2 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        .event-list p {
            color: #555;
            margin-bottom: 20px;
        }

        .event-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .event-table th,
        .event-table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
            font-size: 16px;
        }

        .event-table th {
            background-color: #f8f8f8;
            font-weight: bold;
            color: #333;
        }

        .event-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .action-btn {
            padding: 5px 10px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
        }

        .edit {
            background-color: #4CAF50;
            color: #fff;
        }

        .delete {
            background-color: #f44336;
            color: #fff;
        }

        .edit:hover {
            background-color: #45a049;
        }

        .delete:hover {
            background-color: #d32f2f;
        }

        footer {
            padding: 20px;
            border-top: 1px solid #eaeaea;
            font-size: 14px;
            color: #555;
        }

        .footer-logo {
            font-weight: bold;
            color: #6a0dad;
        }
    </style>
</head>
<body>
<header>
    <div class="header-content">
        <h1>Eventos de Tecnologia <span class="br">BR</span></h1>
        <input type="text" placeholder="Pesquisar eventos" class="search-bar">
        <div class="buttons">
            <button class="add-event" onclick="window.location.href='?acao=create'">Adicionar um evento</button>
            <button class="logout" onclick="window.location.href='views/logout.php'">Logout</button>
        </div>
    </div>
</header>

<main>
    <section class="event-list">
        <h2>Lista de Eventos</h2>
        <p>Aqui você irá encontrar a lista de próximos eventos de tecnologia que irão rolar no Brasil compartilhados pela comunidade!</p>

        <table class="event-table">
            <thead>
            <tr>
                <th>Título</th>
                <th>Descrição</th>
                <th>Data</th>
                <th>Local</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($eventos as $evento): ?>
                <tr>
                    <td><?= htmlspecialchars($evento['titulo']) ?></td>
                    <td><?= htmlspecialchars($evento['descricao']) ?></td>
                    <td><?= htmlspecialchars($evento['data']) ?></td>
                    <td><?= htmlspecialchars($evento['local']) ?></td>
                    <td>
                        <a href="?acao=update&id=<?= $evento['id'] ?>" class="action-btn edit">Editar</a>
                        <a href="?acao=delete&id=<?= $evento['id'] ?>" class="action-btn delete">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</main>

<footer>
    <p>&copy; 2024 <span class="footer-logo">Rafael, Felipe, Arthur, Vinicius</span></p>
</footer>
</body>
</html>
