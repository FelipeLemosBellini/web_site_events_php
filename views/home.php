<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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

        .toggle-button {
            padding: 10px 20px;
            background-color: #ccc;
            color: #333;
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

        .list-section {
            text-align: center;
            max-width: 800px;
            padding: 40px 20px;
        }

        .list-section h2 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        .list-section table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .list-section th,
        .list-section td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
            font-size: 16px;
        }

        .list-section th {
            background-color: #f8f8f8;
            font-weight: bold;
            color: #333;
        }

        .list-section tr:nth-child(even) {
            background-color: #f9f9f9;
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


    </style>
</head>
<body>
<header>
    <div class="header-content">
        <h1>Eventos de Tecnologia <span class="br">BR</span></h1>
        <input type="text" id="search-bar" placeholder="Pesquisar eventos/usuários" class="search-bar">
        <div class="buttons">
            <?php if(!$isParticipante) { ?>
                <button class="toggle-button" id="toggle-lists">Ver Lista de Usuários</button>
                <button class="add-event" onclick="window.location.href='?acao=create'">Adicionar um evento</button>
            <?php } ?>
            <button class="logout" onclick="window.location.href='views/logout.php'">Logout</button>
        </div>
    </div>
</header>

<main>
    <section class="list-section" id="event-list" style="display: block;">
        <h2>Lista de Eventos</h2>
        <table>
            <thead>
            <tr>
                <th>Título</th>
                <th>Descrição</th>
                <th>Data</th>
                <th>Local</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody id="event-tbody">
            <?php foreach ($eventos as $evento): ?>
                <tr>
                    <td><?= htmlspecialchars($evento['titulo']) ?></td>
                    <td><?= htmlspecialchars($evento['descricao']) ?></td>
                    <td><?= htmlspecialchars($evento['data']) ?></td>
                    <td><?= htmlspecialchars($evento['local']) ?></td>
                    <td>
                        <?php if(!$isParticipante) { ?>
                            <a href="?acao=update&id=<?= $evento['id'] ?>" class="action-btn edit">Editar</a>
                            <a href="?acao=delete&id=<?= $evento['id'] ?>" class="action-btn delete">Excluir</a>
                        <?php } else if(!$evento['inscrito']){?>
                            <a href="?acao=participar&id_evento=<?= $evento['id'] ?>" class="action-btn edit">Participar</a>
                        <?php } else {?>
                            <a href="?acao=cancelar_participacao&id=<?= $evento['inscricao_id'] ?>" class="action-btn delete">Cancelar</a>
                        <?php } ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <section class="list-section" id="user-list" style="display: none;">
        <h2>Lista de Usuários</h2>
        <table>
            <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Função</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= htmlspecialchars($usuario['nome']) ?></td>
                    <td><?= htmlspecialchars($usuario['email']) ?></td>
                    <td><?= ucfirst(htmlspecialchars($usuario['tipo'])) ?></td>
                    <td>
                        <a href="?controller=usuario&acao=update&id=<?= $usuario['id'] ?>" class="action-btn edit">Editar</a>
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

<script>
    const toggleButton = document.getElementById('toggle-lists');
    const eventList = document.getElementById('event-list');
    const userList = document.getElementById('user-list');
    const searchBar = document.getElementById('search-bar');

    toggleButton.addEventListener('click', () => {
        if (eventList.style.display === 'block') {
            eventList.style.display = 'none';
            userList.style.display = 'block';
            toggleButton.textContent = 'Ver Lista de Eventos';
        } else {
            userList.style.display = 'none';
            eventList.style.display = 'block';
            toggleButton.textContent = 'Ver Lista de Usuários';
        }
    });

    searchBar.addEventListener('input', function() {
        const searchQuery = this.value.toLowerCase();
        const activeTable = eventList.style.display === 'block' ? 'event-tbody' : 'user-list tbody';

        const rows = document.querySelectorAll(`#${activeTable} tr`);
        rows.forEach(row => {
            const cells = Array.from(row.cells).map(cell => cell.textContent.toLowerCase());
            if (cells.some(text => text.includes(searchQuery))) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
</body>
</html>
